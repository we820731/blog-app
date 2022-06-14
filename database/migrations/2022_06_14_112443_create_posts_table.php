<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index()->default('')->comment('標題');
            $table->text('introduce')->nullable()->comment('摘要');
            $table->mediumText('content')->nullable()->comment('内容');
            $table->string('slug')->unique()->comment('slug');
            $table->unsignedInteger('category_id')->unsigned()->index()->default(0)->comment('分類id');
            $table->unsignedTinyInteger('is_featured')->index()->default(0)->comment('是否精選');
            $table->string('featured_image')->nullable()->comment('精選圖片');
            $table->string('status')->comment('文章狀態');
            $table->date('published_at')->nullable()->comment('發佈時間');
            $table->unsignedInteger('view')->default(0)->comment('瀏覽次數');
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // 移除外鍵約束
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('posts');
    }
};

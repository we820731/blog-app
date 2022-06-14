<?php

return [

    'title' => '編輯 :label',

    'breadcrumb' => '編輯',

    'actions' => [

        'delete' => [

            'label' => '删除',

            'modal' => [

                'heading' => '删除 :label',

                'subheading' => '您確定要這樣做嗎?？',

                'buttons' => [

                    'delete' => [
                        'label' => '删除',
                    ],

                ],

            ],

            'messages' => [
                'deleted' => '已删除',
            ],

        ],

        'view' => [
            'label' => '查看',
        ],

    ],

    'form' => [

        'actions' => [

            'cancel' => [
                'label' => '取消',
            ],

            'save' => [
                'label' => '保存',
            ],

        ],

    ],

    'messages' => [
        'saved' => '已保存',
    ],

];

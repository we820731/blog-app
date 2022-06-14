<?php

return [

    'title' => '登入',

    'heading' => '登入您的帳號',

    'buttons' => [

        'submit' => [
            'label' => '登入',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => '電子信箱',
        ],

        'password' => [
            'label' => '密碼',
        ],

        'remember' => [
            'label' => '記住我',
        ],

    ],

    'messages' => [
        'failed' => '登入憑證與紀錄不符。',
        'throttled' => '嘗試登入次數過多，請在 :seconds 秒後重試。',
    ],

];

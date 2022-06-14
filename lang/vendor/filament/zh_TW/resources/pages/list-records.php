<?php

return [

    'breadcrumb' => '列表',

    'actions' => [

        'create' => [

            'label' => '新增 :label',

            'modal' => [

                'heading' => '新增 :label',

                'actions' => [

                    'create' => [
                        'label' => '新增',
                    ],

                    'create_and_create_another' => [
                        'label' => '保存並新增另一個',
                    ],

                ],

            ],

            'messages' => [
                'created' => '已保存',
            ],

        ],

    ],

    'table' => [

        'actions' => [

            'delete' => [

                'label' => '删除',

                'messages' => [
                    'deleted' => '已删除',
                ],

            ],

            'edit' => [

                'label' => '編輯',

                'modal' => [

                    'heading' => '編輯 :label',

                    'actions' => [

                        'save' => [
                            'label' => '保存',
                        ],

                    ],

                ],

                'messages' => [
                    'saved' => '已保存',
                ],

            ],

            'view' => [
                'label' => '查看',
            ],

        ],

        'bulk_actions' => [

            'delete' => [

                'label' => '删除已選項目',

                'messages' => [
                    'deleted' => '已删除',
                ],

            ],

        ],

    ],

];

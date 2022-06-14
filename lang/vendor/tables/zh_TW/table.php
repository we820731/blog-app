<?php

return [

    'fields' => [

        'search_query' => [
            'label' => '搜尋',
            'placeholder' => '搜尋',
        ],

    ],

    'pagination' => [

        'label' => '分頁',

        'overview' => '目前顯示第 :first 筆到第 :last 筆，共 :total 筆',

        'fields' => [

            'records_per_page' => [
                'label' => '每頁',
            ],

        ],

        'buttons' => [

            'go_to_page' => [
                'label' => '跳轉到 :page',
            ],

            'next' => [
                'label' => '下一頁',
            ],

            'previous' => [
                'label' => '上一頁',
            ],

        ],

    ],

    'buttons' => [

        'filter' => [
            'label' => '篩選',
        ],

        'open_actions' => [
            'label' => '展開操作選項',
        ],

    ],

    'empty' => [
        'heading' => '沒有找到相關紀錄',
    ],

    'filters' => [

        'buttons' => [

            'reset' => [
                'label' => '重置篩選條件',
            ],

            'close' => [
                'label' => '關閉',
            ],

        ],

        'multi_select' => [
            'placeholder' => '全部',
        ],

        'select' => [
            'placeholder' => '全部',
        ],

    ],

    'selection_indicator' => [

        'selected_count' => '已選 :count 筆紀錄',

        'buttons' => [

            'select_all' => [
                'label' => '選擇全部 :count 筆紀錄',
            ],

            'deselect_all' => [
                'label' => '取消全選',
            ],

        ],

    ],

];

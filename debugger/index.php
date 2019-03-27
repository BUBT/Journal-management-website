<?php

// 用以测试的文件：输出多条数据

$arr = [
    "issues" => [
        [
            "aid"=> "2",
            "title"=> "标题",
            "time"=> "2019-03-19 15=>41=>14"
        ],
        [
            "aid"=> "4",
            "title"=> "我爱海南",
            "time"=> "2019-03-22 20=>50=>47"
        ],
        [
            "aid"=> "5",
            "title"=> "hduskda",
            "time"=> "2019-03-22 20=>52=>14"
        ],
        [
            "aid"=> "6",
            "title"=> "Title",
            "time"=> "2019-03-27 15=>15=>34"
        ]
        ],
    "tags" => [
        [
            "tid"=> "3",
            "tag"=> "20世纪中国学术家研究"
        ],
        [
            "tid"=> "1",
            "tag"=> "南海研究"
        ],
        [
            "tid"=> "2",
            "tag"=> "当代海南论坛"
        ],
        [
            "tid"=> "7",
            "tag"=> "教育学"
        ],
        [
            "tid"=> "5",
            "tag"=> "文学"
        ],
        [
            "tid"=> "4",
            "tag"=> "民族学"
        ],
        [
            "tid"=> "6",
            "tag"=> "艺术学"
        ]
    ]
];


echo json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
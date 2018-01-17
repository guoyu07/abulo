<?php

return [
    // 数据存储
    'store'=> [


        //日志保存
        'logger'=>[
            // 'driver' => 'Datebase.MongoDB.MongoDB',
            'uriOptions' => [
                //应用程序名称,分析慢查询日志需要
                'appname' => 'system',
                'password' => 'admin123',
                'username' => 'admin',
                'readConcernLevel' => \MongoDB\Driver\ReadConcern::LOCAL,
                'readPreference' => 'secondaryPreferred',
                'w' => \MongoDB\Driver\WriteConcern::MAJORITY,
            ],
            'driverOptions' => [],
            'host' =>[
                '172.18.1.2:27017'
            ],
            'database'=>'loger',
            'collection'=>'loger',
        ],
        'db' => [

        ],







    ],
];

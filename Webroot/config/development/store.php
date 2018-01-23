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
        // 数据库配置
        'mysql' => [
            'db1' => [
                'host'=> '172.18.1.3',
                'port'=> 3306,
                'user'=> 'root',
                'password'=> 'mysql',
                'charset'=> 'utf8mb4',
                'database'=> 'demo',
                'maxPool' => 10,//最大连接池
                'timeout' => 3,//超时时间
            ],
            'db2' => [
                'host'=> '172.18.1.3',
                'port'=> 3306,
                'user'=> 'root',
                'password'=> 'mysql',
                'charset'=> 'utf8mb4',
                'database'=> 'demo',
                'maxPool' => 10,//最大连接池
                'timeout' => 3,//超时时间
            ],
            'db3' => [
                'host'=> '172.18.1.3',
                'port'=> 3306,
                'user'=> 'root',
                'password'=> 'mysql',
                'charset'=> 'utf8mb4',
                'database'=> 'demo',
                'maxPool' => 10,//最大连接池
                'timeout' => 3,//超时时间
            ],
        ],
        'mysql_proxy'=>[
            //随便取
            'master_slave' => [
                'pools' => [
                    'master' => 'db1',
                    'slaves' => ['db3', 'db2'],
                ],
            ],
        ],

        'redis' => [
            'sessoin' => [
                'ip'=>'172.18.1.4',
                'port'=>'6379',
                'maxPool' => 10,//最大连接池
                'timeout' => 3,//超时时间
                // 'password'=>'密码',
            ],
            'p1' => [
                'ip'=>'172.18.1.4',
                'port'=>'6379',
                'maxPool' => 10,//最大连接池
                'timeout' => 3,//超时时间
                // 'password'=>'密码',
            ],
            'p2' => [
                'ip'=>'172.18.1.4',
                'port'=>'6379',
                'maxPool' => 10,//最大连接池
                'timeout' => 3,//超时时间
                // 'password'=>'密码',
            ],
            'p3' => [
                'ip'=>'172.18.1.4',
                'port'=>'6379',
                'maxPool' => 10,//最大连接池
                'timeout' => 3,//超时时间
                // 'password'=>'密码',
            ],
            'p4' => [
                'ip'=>'172.18.1.4',
                'port'=>'6379',
                'maxPool' => 10,//最大连接池
                'timeout' => 3,//超时时间
                // 'password'=>'密码',
            ],

        ],
        'redis_proxy' => [
            //下标随便取
            'master_slave' => [
                'pools' => [
                    'p1','p2'
                ],
            ],
        ],







    ],
];

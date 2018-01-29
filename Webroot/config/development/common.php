<?php

return [
    'common' =>[
        'timezone' => 'PRC',//设置时区
    ],
    'coroution'=>[
        'timerOut' => 5000,//协程超时时间
    ],

    'auto_reload_enable' => true,//是否启用自动reload
    'auto_restart_enable' => true,//是否启用自动reload
    'auto_restart_timer' => 3600,//不能超过86400 单位秒
    'allow_ServerController' => true,//是否允许访问Server中的Controller，如果不允许将禁止调用Server包中的Controller
    'name' => 'weimeng',//服务名称
    'server' => [
        'send_use_task_num' => 500,
        'set' => [
            'log_file' => STORAGE_LOG_PATH."/swoole.log",
            'pid_file' => STORAGE_PID_PATH . '/server.pid',
            'log_level' => 5,
            'reactor_num' => 4, //reactor thread num
            'worker_num' => 4,    //worker process num
            'backlog' => 128,   //listen backlog
            'open_tcp_nodelay' => 1,
            'dispatch_mode' => 2,
            'task_worker_num' => 5,
            'task_max_request' => 5000,
            'enable_reuse_port' => true,
            'heartbeat_idle_time' => 120,//2分钟后没消息自动释放连接
            'heartbeat_check_interval' => 60,//1分钟检测一次
            'max_connection' => 100000,
            'user'=>'www',
            'group'=>'www',
        ],
    ],


    'log' => [
        'active' => 'file' ,//提供 file 和 mongodb 两种方案
        'log_name' => 'weimeng',
        'log_level' => \Monolog\Logger::DEBUG,
        'file' => [
            'log_max_files' = 15,
            'efficiency_monitor_enable' = false,
        ],
        'mongodb' => [
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
            'database'=>'logger',
            'efficiency_monitor_enable' = false,
        ],
    ],

    'ports' => [
        [
            'socket_type' => \Kernel\CoreBase\PortManager::SOCK_TCP,
            'socket_name' => '0.0.0.0',
            'socket_port' => 9091,
            'pack_tool' => 'LenJsonPack',
            'route_tool' => 'NormalRoute',
            'middlewares' => ['MonitorMiddleware'],
            'weight' =>1,//权重 越小,则是主服务,它负责监听其他同类型的服务
        ],
        [
            'socket_type' => \Kernel\CoreBase\PortManager::SOCK_HTTP,
            'socket_name' => '0.0.0.0',
            'socket_port' => 8081,
            'route_tool' => 'NormalRoute',
            'middlewares' => ['MonitorMiddleware', 'NormalHttpMiddleware'],
            'method_prefix' => 'http_',
            'weight' => 2,
        ],
        [
            'socket_type' => \Kernel\CoreBase\PortManager::SOCK_WS,
            'socket_name' => '0.0.0.0',
            'socket_port' => 8083,
            'route_tool' => 'NormalRoute',
            'pack_tool' => 'NonJsonPack',
            'opcode' => PortManager::WEBSOCKET_OPCODE_TEXT,
            'middlewares' => ['MonitorMiddleware', 'NormalHttpMiddleware'],
            'weight' => 3,
        ],

    ],




    // 'mongodb' => [
    //     'logger' => [
    //         'uriOptions' => [
    //             //应用程序名称,分析慢查询日志需要
    //             'appname' => 'system',
    //             'password' => 'admin123',
    //             'username' => 'admin',
    //             'readConcernLevel' => \MongoDB\Driver\ReadConcern::LOCAL,
    //             'readPreference' => 'secondaryPreferred',
    //             'w' => \MongoDB\Driver\WriteConcern::MAJORITY,
    //         ],
    //         'driverOptions' => [],
    //         'host' =>[
    //             '172.18.1.2:27017'
    //         ],
    //         'database'=>'logger',
    //     ],
    // ],


];

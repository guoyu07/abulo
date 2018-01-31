<?php

return [
    'monitor'=>[
        WEBROOT_PATH,
        KERNEL_PATH
    ],
    'common' =>[
        'timezone' => 'PRC',//设置时区
    ],
    'coroution'=>[
        'timerOut' => 5000,//协程超时时间
    ],

    'auto_reload_enable' => true,//是否启用自动reload
    'auto_restart_enable' => true,//是否启用自动reload
    'auto_restart_timer' => 600,//不能超过86400 单位秒
    'allow_ServerController' => true,//是否允许访问Server中的Controller，如果不允许将禁止调用Server包中的Controller
    'name' => 'weimeng',//服务名称
    'server' => [
        'send_use_task_num' => 500,
        'set' => [
            'log_file' => STORAGE_LOG_PATH."/swoole.log",
            'pid_file' => STORAGE_PID_PATH . '/server.pid',
            'log_level' => 5,
            'reactor_num' => 1, //reactor thread num
            'worker_num' => 1,    //worker process num
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
            'log_max_files' => 15,
            'efficiency_monitor_enable' => false,
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
            'efficiency_monitor_enable' => false,
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
            'route_tool' => 'FRoute',
            'middlewares' => ['MonitorMiddleware', 'NormalHttpMiddleware'],
            'method_prefix' => '',
            'weight' => 2,
        ],
        [
            'socket_type' => \Kernel\CoreBase\PortManager::SOCK_WS,
            'socket_name' => '0.0.0.0',
            'socket_port' => 8083,
            'route_tool' => 'NormalRoute',
            'pack_tool' => 'NonJsonPack',
            'opcode' => \Kernel\CoreBase\PortManager::WEBSOCKET_OPCODE_TEXT,
            'middlewares' => ['MonitorMiddleware', 'NormalHttpMiddleware'],
            'weight' => 3,
        ],

    ],

    'redis' => [
        'enable'=> true,
        'active'=> 'local',
        /**
         * 本地环境
         */
        'local'=>[
            'ip'=> '172.18.1.4',
            'port'=> 6379,
            'select'=> 1,
            // 'password'=> '123456',
        ],
        'asyn_max_count'=> 10,
    ],


    'mysql' =>[

        'enable'=> true,
        'active'=> 'test',
        'test'=>[
            'host'=> '172.18.1.3',
            'port'=> 3306,
            'user'=> 'root',
            'password'=> 'mysql',
            'database'=> 'one',
            'charset'=> 'utf8mb4',
        ],
        'asyn_max_count' => 10,
    ],


    'timerTask' =>[],




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

    'amqp'=>[
        'active'=>'local',
        'local'=>[
            'host'=> 'localhost',
            'port'=> 5672,
            'user'=> 'guest',
            'password'=> 'guest',
            'vhost'=> '/',
        ],
    ],


    'httpClient'=>[
        'asyn_max_count' => 10,
    ],
    'tcpClient'=>[
        'asyn_max_count'=> 10,
    ],
    'tcpClient'=>[
        'test'=>[
            'pack_tool'=>'LenJsonPack',
        ],
        'consul'=>[
            'pack_tool'=>'LenJsonPack',
        ],
        'consul_MathService'=>[
            'pack_tool'=>'LenJsonPack'
        ],
    ],



    'consul'=>[
        //是否启用consul
        'enable' => true,
        //数据中心配置
        'datacenter'=>'dc1',
        // 'bind_addr' => '172.18.1.5',
        //开放给本地
        'client_addr'=>'127.0.0.1',
        //服务器名称，同种服务应该设置同样的名称，用于leader选举
        'leader_service_name'=>'weimeng',
        //node的名字，每一个都必须不一样,也可以为空自动填充主机名
        'node_name'=>'SD-1',
        //consul的data_dir默认放在临时文件下
        'data_dir'=>"/tmp/consul",
        // consul join地址，可以是集群的任何一个，或者多个
        // 'start_join'=>['172.18.1.6','172.18.1.7','172.18.1.8'],
        'start_join'=>['172.18.1.5'],
        //本地网卡设备
        'bind_net_dev'=>'eth0',
        //监控服务
        'watches' =>['monitor'],
        //发布服务
        'services' =>['monitor:9091', 'monitor:8081'],
    ],
    'cluster'=>[
        //是否开启TCP集群,启动consul才有用
        'enable'=>true,
        //TCP集群端口
        'port'=>9999
    ],
];

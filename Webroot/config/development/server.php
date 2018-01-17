<?php

return [
    'server' => [
        'ott'=>[
            'swoole_type' => 'http',//服务类型
            'service_name'=> 'weimeng',//服务名称
            'ip'=>'0.0.0.0',//绑定的 IP
            'port'=>'60080',//绑定的端口
            'mode' => SWOOLE_PROCESS,
            'inotify' => 1,
            'auto_reload' => 1,
            'auto_reload_time' => 3600,
            'set' => [
                'reactor_num'=>4,//Reactor线程数,CPU核数的4倍
                'worker_num' => 1,//worker进程数,每个进程占用40M内存
                // 'max_request' => 1000,//设置worker进程的最大任务数，默认为0
                // 'max_connection' => 1000,//服务器程序，最大允许的连接数,最大不得超过操作系统ulimit -n的值
                'task_worker_num' => 1,//Task进程的数量
            ],
        ],


    ],
    //配置 swoole 的需要的公共参数
    'swoole' => [
        'http'=>[
            'reactor_num'=>4,//Reactor线程数,CPU核数的4倍
            'worker_num' => 16,//worker进程数,每个进程占用40M内存
            'max_request' => 1000,//设置worker进程的最大任务数，默认为0
            'max_connection' => 1000,//服务器程序，最大允许的连接数,最大不得超过操作系统ulimit -n的值
            'task_worker_num' => 16,//Task进程的数量
            // 单个task的处理耗时，如100ms，那一个进程1秒就可以处理1/0.1=10个task
            // task投递的速度，如每秒产生2000个task
            // 2000/10=200，需要设置task_worker_num => 200，启用200个task进程
            'task_ipc_mode' => 1,
            // 1, 使用unix socket通信，默认模式
            // 2, 使用消息队列通信
            // 3, 使用消息队列通信，并设置为争抢模式
            'task_max_request'=> 0,
            'task_tmpdir' => '',//TODO
            'dispatch_mode' =>2,
            'daemonize' => false,
            //Listen队列长度，如backlog => 128，此参数将决定最多同时有多少个等待accept的连接
            'backlog' => 128,
            'log_level' => 4,
            'heartbeat_idle_time' => 120,//2分钟后没消息自动释放连接
            'heartbeat_check_interval' => 60,//1分钟检测一次
            'open_cpu_affinity' =>1,
            'open_tcp_nodelay' => 1,
            'user'=> 'www',
            'group'=> 'www',
            'pipe_buffer_size' => 32 * 1024 *1024, //必须为数字
            'buffer_output_size' => 32 * 1024 *1024, //必须为数字
            'open_http_protocol' => 1,
            'http_parse_post'=> 1,
            'enable_static_handler' => true,
        ],
        'tcp'=>[
            'reactor_num'=>4,//Reactor线程数,CPU核数的4倍
            'worker_num' => 16,//worker进程数,每个进程占用40M内存
            'max_request' => 1000,//设置worker进程的最大任务数，默认为0
            'max_connection' => 1000,//服务器程序，最大允许的连接数,最大不得超过操作系统ulimit -n的值
            'task_worker_num' => 16,//Task进程的数量
            // 单个task的处理耗时，如100ms，那一个进程1秒就可以处理1/0.1=10个task
            // task投递的速度，如每秒产生2000个task
            // 2000/10=200，需要设置task_worker_num => 200，启用200个task进程
            'task_ipc_mode' => 1,
            // 1, 使用unix socket通信，默认模式
            // 2, 使用消息队列通信
            // 3, 使用消息队列通信，并设置为争抢模式
            'task_max_request'=> 0,
            'task_tmpdir' => '',//TODO
            'dispatch_mode' =>2,
            'daemonize' => false,
            //Listen队列长度，如backlog => 128，此参数将决定最多同时有多少个等待accept的连接
            'backlog' => 128,
            'log_level' => 4,
            'heartbeat_idle_time' => 120,//2分钟后没消息自动释放连接
            'heartbeat_check_interval' => 60,//1分钟检测一次
            'open_cpu_affinity' =>1,
            'open_tcp_nodelay' => 1,
            'user'=> 'www',
            'group'=> 'www',
            'pipe_buffer_size' => 32 * 1024 *1024, //必须为数字
            'buffer_output_size' => 32 * 1024 *1024, //必须为数字
            'tcp_fastopen' => true
        ],
        'udp'=>[
            'reactor_num'=>4,//Reactor线程数,CPU核数的4倍
            'worker_num' => 16,//worker进程数,每个进程占用40M内存
            'max_request' => 1000,//设置worker进程的最大任务数，默认为0
            'max_connection' => 1000,//服务器程序，最大允许的连接数,最大不得超过操作系统ulimit -n的值
            'task_worker_num' => 16,//Task进程的数量
            // 单个task的处理耗时，如100ms，那一个进程1秒就可以处理1/0.1=10个task
            // task投递的速度，如每秒产生2000个task
            // 2000/10=200，需要设置task_worker_num => 200，启用200个task进程
            'task_ipc_mode' => 1,
            // 1, 使用unix socket通信，默认模式
            // 2, 使用消息队列通信
            // 3, 使用消息队列通信，并设置为争抢模式
            'task_max_request'=> 0,
            'task_tmpdir' => '',//TODO
            'dispatch_mode' =>2,
            'daemonize' => false,
            //Listen队列长度，如backlog => 128，此参数将决定最多同时有多少个等待accept的连接
            'backlog' => 128,
            'log_level' => 4,
            'open_cpu_affinity' =>1,
            'open_tcp_nodelay' => 1,
            'user'=> 'www',
            'group'=> 'www',
            'pipe_buffer_size' => 32 * 1024 *1024, //必须为数字
            'buffer_output_size' => 32 * 1024 *1024, //必须为数字
            'tcp_fastopen' => true
        ],
        'websocket'=>[
            'reactor_num'=>4,//Reactor线程数,CPU核数的4倍
            'worker_num' => 16,//worker进程数,每个进程占用40M内存
            'max_request' => 1000,//设置worker进程的最大任务数，默认为0
            'max_connection' => 1000,//服务器程序，最大允许的连接数,最大不得超过操作系统ulimit -n的值
            'task_worker_num' => 16,//Task进程的数量
            // 单个task的处理耗时，如100ms，那一个进程1秒就可以处理1/0.1=10个task
            // task投递的速度，如每秒产生2000个task
            // 2000/10=200，需要设置task_worker_num => 200，启用200个task进程
            'task_ipc_mode' => 1,
            // 1, 使用unix socket通信，默认模式
            // 2, 使用消息队列通信
            // 3, 使用消息队列通信，并设置为争抢模式
            'task_max_request'=> 0,
            'task_tmpdir' => '',//TODO
            'dispatch_mode' =>2,
            'daemonize' => false,
            //Listen队列长度，如backlog => 128，此参数将决定最多同时有多少个等待accept的连接
            'backlog' => 128,
            'log_level' => 4,
            'heartbeat_idle_time' => 120,//2分钟后没消息自动释放连接
            'heartbeat_check_interval' => 60,//1分钟检测一次
            'open_cpu_affinity' =>1,
            'open_tcp_nodelay' => 1,
            'user'=> 'www',
            'group'=> 'www',
            'pipe_buffer_size' => 32 * 1024 *1024, //必须为数字
            'buffer_output_size' => 32 * 1024 *1024, //必须为数字
            'tcp_fastopen' => true

        ],
    ],

];

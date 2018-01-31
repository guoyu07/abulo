<?php

namespace App\LaunchServer;

use Kernel\SwooleDistributedServer;
use Kernel\CoreBase\HttpInput;

class Http extends SwooleDistributedServer
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 用户进程
     */
    public function startProcess()
    {
        parent::startProcess();
    }

    /**
     * 可以在这验证WebSocket连接,return true代表可以握手，false代表拒绝
     * @param HttpInput $httpInput
     * @return bool
     */
    public function onWebSocketHandCheck(HttpInput $httpInput)
    {
        return true;
    }


    /**
     * @return string
     */
    public function getCloseMethodName()
    {
        return 'onClose';
    }

    /**
     * @return string
     */
    public function getEventControllerName()
    {
        return '\\App\\Controller\\MTest';
    }

    /**
     * @return string
     */
    public function getConnectMethodName()
    {
        return 'onConnect';
    }
}

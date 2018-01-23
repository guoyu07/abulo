<?php

namespace LaunchServer;

use Kernel\Server\Http\HttpServer;

class Http extends HttpServer
{

    public function __construct($key)
    {
        parent::__construct($key);
    }
}

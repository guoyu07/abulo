<?php
include_once dirname(__DIR__).DIRECTORY_SEPARATOR.'init.php';
(new \Kernel\Server\Http\HttpServer('server.ott'))->run();

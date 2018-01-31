<?php
include_once dirname(__DIR__).DIRECTORY_SEPARATOR.'init.php';

$worker = new \App\LaunchServer\Http();
\Kernel\Start::run();

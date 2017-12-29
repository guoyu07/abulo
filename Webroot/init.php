<?php
//程序启动配置文件
define('DS', DIRECTORY_SEPARATOR);
//定义 webroot 目录
define('WEBROOT_PATH', __DIR__);
//定义 config 目录
define('CONFIG_PATH', WEBROOT_PATH.DS.'config');
//定义 htdocs 目录
define('HTDOCS_PATH', WEBROOT_PATH.DS.'htdocs');
//定义程序目录
define('PROGRAM_PATH', WEBROOT_PATH.DS.'Program');
//定义 storage 目录
define('STORAGE_PATH', WEBROOT_PATH.DS.'storage');
//定义 log 目录
define('STORAGE_LOG_PATH', STORAGE_PATH.DS.'log');
//定义 pid 目录
define('STORAGE_PID_PATH', STORAGE_PATH.DS.'pid');
//定义 cache 目录
define('STORAGE_CACHE_PATH', STORAGE_PATH.DS.'cache');
//定义 Kernel 目录
define('KERNEL_PATH', dirname(WEBROOT_PATH).DS.'Kernel');
// 定义Route目录
define('ROUTE_PATH', PROGRAM_PATH.DS.'Route');
// 定义Html TPL 目录
define('TPL_PATH', PROGRAM_PATH.DS.'View');
//定义环境变量
define('ENV', 'development');
//定义版本
define('VERSION', '1.0.0');

include_once KERNEL_PATH.DS.'Autoloader.php';
$classLoader = new Autoloader();



$paths = [
    HTDOCS_PATH,
    WEBROOT_PATH,
    CONFIG_PATH,
    PROGRAM_PATH,
    STORAGE_PATH,
    STORAGE_LOG_PATH,
    STORAGE_PID_PATH,
    STORAGE_CACHE_PATH,
    ROUTE_PATH
];
//创建必要目录
foreach ($paths as $path) {
    if (!is_dir($path)) {
        @mkdir($path, 0777, true);
    }
}
unset($paths, $path);
//加载目录
$classMap = KERNEL_PATH.DS.'ClassMap.php';
$appClassMap = CONFIG_PATH.DS.'ClassMap.php';
$classMap = is_file($classMap) ? $classMap = include_once $classMap : [];
$appClassMap = is_file($appClassMap) ? $appClassMap = include_once $appClassMap : [];

$namespaces = array_merge($classMap['namespaces'], $appClassMap['namespaces']);

$files = array_merge($classMap['files'], $appClassMap['files']);
unset($classMap, $appClassMap);

$classLoader->setPrefixes($namespaces);
$classLoader->requireFiles($files);
$classLoader->register();
unset($namespaces, $files);

// \Kernel\Config\Config::init();
// \Kernel\Config\Log::init();

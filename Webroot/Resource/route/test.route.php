<?php
return [
    // ['/admin',
    //     [
    //         ['GET','/user','IndexController@index1','name1'],
    //         ['GET','/user/{id:\d+}','IndexController@index2','name2'],
    //         ['GET','/show/{id:[a-zA-Z]+}','IndexController@index3','name3'],
    //     ]
    // ],
    // ['GET','/user/{id:\d+}','\\Kernel\\Test\\TestController@callback','name4'],
    // ['GET','/show/{id:[a-zA-Z]+}','IndexController@index5','name5'],
    ['GET','/monitor/_consul_health','\\App\\Controller\\Test@health','name'],
    ['GET','/status','\\App\\Controller\\Test@status','name1'],
    // ['GET','/TestController/_consul_health','\\App\\Controller\\Test@health','name1'],
];

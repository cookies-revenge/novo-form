<?php

$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion('2.0.0-dev');
$serviceContainer->setAdapterClass('nf_test', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle();
$manager->setConfiguration([
    'dsn' => 'mysql:host=localhost;port=3306;dbname=nf_test',
    'user' => 'phpmyadmin',
    'password' => 'toor',
    'settings' =>
    [
        'charset' => 'utf8',
        'queries' => [],
    ],
    'classname' => '\\Propel\\Runtime\\Connection\\ConnectionWrapper',
    'model_paths' =>
    [
        0 => 'src',
        1 => 'vendor',
    ],
]);
$manager->setName('nf_test');
$serviceContainer->setConnectionManager('nf_test', $manager);
$serviceContainer->setDefaultDatasource('nf_test');
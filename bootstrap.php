<?php

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

if ( ! file_exists($file = __DIR__.'/vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run this script.');
}

$loader = require_once $file;

$connection = new Connection();
$config = new Configuration();

$config->setProxyDir(__DIR__ . '/cache/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/cache/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('try_doctrine_mongodb');

$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . ''));

AnnotationDriver::registerAnnotationClasses();

return DocumentManager::create($connection, $config);

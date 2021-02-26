<?php

include __DIR__ . "/../vendor/autoload.php";

date_default_timezone_set('PRC');

use Monolog\Logger;

// Create the logger
$logger = new Logger('my_logger');
// Now add some handlers
//$logger->pushHandler(new StdoutHandler());

$config = \Kafka\ConsumerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(1000);
$config->setMetadataBrokerList('127.0.0.1:9092');
$config->setGroupId('test');
$config->setBrokerVersion('1.0.0');
$config->setTopics(array('test'));

//$config->setOffsetReset('earliest');
$consumer = new \Kafka\Consumer();
$consumer->setLogger($logger);
$consumer->start(function($topic, $part, $message) {
    var_dump($message);
});

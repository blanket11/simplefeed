<?php

require_once(__DIR__ . '/lib/common.php');

$xml = 'https://xxx.xml';

$simple_feed = new SimpleFeed();

$simple_feed_data = $simple_feed->load($xml);

var_dump($simple_feed_data);

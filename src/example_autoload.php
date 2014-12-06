<?php

/*
 * You may use require_once similar to below to autoload
 * the MyAllocator PHP SDK. Composer package install is
 * preferred.
 */

require_once(dirname(__FILE__) . '/MyAllocator.php');

use MyAllocator\phpsdk\Api\HelloWorld;

$params = array(
    'Auth' => 'true',
    'hello' => 'world'
);

$api = new HelloWorld();
$rsp = $api->callApiWithParams($params);
var_dump($rsp);
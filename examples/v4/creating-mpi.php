<?php

require 'billplz.phar';

$api = 'xxx';

$billplz = Billplz\Client::make($api)->useSandbox();

$response = $billplz->massPayment('v4')->create('do4wg1tj', 'BIMBMYKL', 'xxx', 'xxx', 'xxx', 'testing', 200);

var_dump($response->getStatusCode(), $response->toArray());

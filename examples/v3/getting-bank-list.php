<?php

require 'billplz.phar';

$api = 'xxx';

$billplz = Billplz\Client::make($api)->useSandbox();

$bank = $billplz->bank();
$response = $bank->supportedForFpx();

var_dump($response->getStatusCode(), $response->toArray());

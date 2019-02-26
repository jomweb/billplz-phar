<?php

require 'billplz.phar';

$api = 'xxx';
$logo = '/Users/crynobone/Documents/billplz.jpg';

$billplz = Billplz\Client::make($api)->useSandbox();

$response = $billplz->collection()->create('My First API Collection with Logo', [
    'logo' => $logo,
]);

var_dump($response->getStatusCode(), $response->toArray());

<?php

require "vendor/autoload.php";

Laravie\Codex\Discovery::override(
    new Http\Client\Common\HttpMethodsClient(
        new Http\Adapter\Guzzle6\Client(), new Http\Message\MessageFactory\GuzzleMessageFactory()
    )
);

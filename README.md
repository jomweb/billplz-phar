PHP framework agnostic library for working with BillPlz API v3 and beyond in PHAR...
==============

* [Installation](#installation)
* [Usages](#usages)

## Installation

The preferred method of installation is to use the Box PHAR which can be downloaded from the most recent [Github Release](https://github.com/jomweb/billplz-phar/releases). This method ensures you will not have any dependency conflict issue.

You should received `billplz.phar` file which you can include to your project. 

## Usages

To start using the library, you can first require the file in your project.

```php
<?php

require "billplz.phar";

$client = Billplz\Client::make('your-api-key', 'your-x-signature-key');

// ...
```

Please go through [jomweb/billplz](https://github.com/jomweb/billplz) for full documentation. 

<?php

use Babylon\Checkout\Checkout;

require 'vendor/autoload.php';
require 'src/Babylon/configure.php';

$co = new Checkout($promotionalRuleContainer);

$co->scan($item001);
$co->scan($item002);
$co->scan($item001);
$co->scan($item003);

$price = $co->total();
echo 'Price expected : '.$price;

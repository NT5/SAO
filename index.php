<?php

require_once __DIR__ . '/vendor/autoload.php';

use SAO\Application\Web;

\Twig_Autoloader::register();

$Web = (new Web())->app();

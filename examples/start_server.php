<?php

use ESD\Examples\Application;

require __DIR__ . '/../vendor/autoload.php';
define("ROOT_DIR", __DIR__ . "/..");
define("RES_DIR", __DIR__ . "/resources");
define("WWW_DIR", __DIR__ . "/www");
Application::main();
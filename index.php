<?php

declare(strict_types=1);

namespace App;

require_once("src/Utils/debug.php");
require_once("src/Controler.php");

$config = require_once("./config/config.php");

$request = [
  'get' => $_GET,
  'post' => $_POST
];

Controler::initConfiguration($config);

(new Controler($request))->run();

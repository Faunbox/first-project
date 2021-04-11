<?php

declare(strict_types=1);

namespace App;

require_once("src/Utils/debug.php");
require_once("src/Controler.php");

$request = [
  'get' => $_GET,
  'post' => $_POST
];

(new Controler($request))->run();

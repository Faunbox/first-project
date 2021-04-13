<?php

declare(strict_types=1);

namespace App;

require_once("src/Utils/debug.php");
require_once("src/Controler.php");
require_once("./src/Exeptions/AppExeptions.php");

use App\Exception\AppException;
use Throwable;



$config = require_once("./config/config.php");

$request = [
  'get' => $_GET,
  'post' => $_POST
];

try {
  Controler::initConfiguration($config);
  
  (new Controler($request))->run();
} catch (AppException $e) {
  echo "<h2>Error</h2>";
  echo "<h3>Message : ". $e->getMessage() . "</h3>";
}
catch (Throwable $e) {
  dump($e);
}

<?php

declare(strict_types=1);

namespace App;

require_once("./src/Exeptions/AppExeptions.php");

use App\Exception\AppException;
use PDO;
use Throwable;

class Database
{
public function __construct(array $db)
{
    try {
        
    $dsn = "mysql:dbname={$db['database']};host={$db['host']}";
    $conneciton = new PDO(
        $dsn,
        $db['user'],
        $db['password']
    );
    } catch (Throwable $e) {
        throw new AppException('Database connection error');
    }

}
}
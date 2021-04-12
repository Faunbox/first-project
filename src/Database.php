<?php

declare(strict_types=1);

namespace App;

use PDO;

class Database
{
public function __construct(array $db)
{
    $dsn = "mysql:dbname={$db['database']};host={$db['host']}";
    $conneciton = new PDO(
        $dsn,
        $db['user'],
        $db['password']
    );

    dump($conneciton);
}
}
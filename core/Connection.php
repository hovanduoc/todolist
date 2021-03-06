<?php

namespace App\Core;

use \PDO;

class Connection
{
    public static function make(array $config)
    {
        try {
            return new PDO(
                "{$config['driver']}:host={$config['host']};dbname={$config['dbname']}",
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

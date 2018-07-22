<?php

use App\Core\{Connection, DB, QueryBuilder};

require __DIR__.'/../vendor/autoload.php';

include_once __DIR__.'/../core/view.php';
include_once __DIR__.'/../core/redirect.php';


DB::bind('config', require 'config/database.php');

DB::bind(
    'db',
    new QueryBuilder(Connection::make(DB::get('config')['database']))
);
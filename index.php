<?php

use App\Core\{Request, Router};

require 'bootstrap/app.php';

Router::load('routes/web.php')
    ->direct(Request::uri(), Request::method());

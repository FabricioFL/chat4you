<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;

Router::get('/', 'pages/index');

Router::get('/signin', 'pages/signin');
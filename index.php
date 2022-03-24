<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;

Router::get('/', 'pages/index');

Router::get('/signin', 'pages/signin');

Router::get('/about', 'pages/about');

Router::get('/features', 'pages/features');

Router::get('/logout', 'pages/logout');
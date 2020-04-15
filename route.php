<?php
require_once('vendor/autoload.php');

use Site\Exception\RouteException;
use Site\Route;


$route = new Route();
$route = '/patients/2/metrics';
$requestMethod = 'POST';

try {
    $route->route($route, $requestMethod);
} catch (RouteException $exception) {
    $error = $exception->getMessage();
    include('App/error.php');
}

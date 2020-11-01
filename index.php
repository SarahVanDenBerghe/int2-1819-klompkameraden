<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

$routes = array(
  'home' => array(
    'controller' => 'Pages',
    'action' => 'index'
  ),
  'events' => array(
    'controller' => 'Pages',
    'action' => 'events'
  ),
    'detail' => array(
    'controller' => 'Pages',
    'action' => 'detail'
  ),
  'story' => array(
    'controller' => 'Pages',
    'action' => 'story'
   ),
   'cart' => array(
    'controller' => 'Orders',
    'action' => 'cart'
  ),
   'checkout' => array(
    'controller' => 'Orders',
    'action' => 'checkout'
  ),
   'confirmation' => array(
    'controller' => 'Orders',
    'action' => 'confirmation'
  )
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();

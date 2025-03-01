<?php
error_reporting(E_ALL & ~E_DEPRECATED);

require_once __DIR__ . "/vendor/autoload.php";
require_once "middleware.php";

use App\Controllers\Controller;

use App\Routers\Router;

$router = new Router();
$Controller = new Controller();

$router->addMiddleware('logRequest');

$router->addRoute("/", [$Controller, "index"]);
$router->addRoute("/admin", [$Controller, "admin"], ['isAdmin']);

$router->addRoute("/login", [$Controller, "login"]);

$router->addRoute("/admin/create", [$Controller, "createShop"], ['isAdmin']);
$router->addRoute("/admin/update/{id}", [$Controller, "updateShop"], ['isAdmin']);
$router->addRoute("/admin/delete/{id}", [$Controller, "deleteShop"], ['isAdmin']);

$router->addRoute("/filter", [$Controller, "filter"]);

$router->dispatch();

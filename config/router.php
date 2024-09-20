<?php
use Klein\Klein;
use Psr\Container\ContainerInterface;

require_once __DIR__ . '/../vendor/autoload.php';

/** @var ContainerInterface $container */
$container = require_once __DIR__ . '/container.php';

$router = new Klein();

// Define routes
$router->respond('POST', '/product/create', function ($request, $response) use ($container) {
    $controller = $container->get(App\Controller\ProductController::class);
    $controller->createProduct($request);
    return $response;
});

$router->respond('GET', '/product/[i:id]', function ($request, $response) use ($container) {
    $controller = $container->get(App\Controller\ProductController::class);
    $controller->getProduct($request->id);
    return $response;
});

$router->respond('GET', '/', function ($request, $response) use ($container) {
    $controller = $container->get(App\Controller\ProductController::class);
    $controller->getAllProducts();
    return $response;
});

// Dispatch the routes
$router->dispatch();
<?php
use App\Application\Service\ProductService;
use App\Controller\ProductController;
use App\Infrastructure\Repository\ProductRepository;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use DI\ContainerBuilder;

require_once __DIR__ . '/../bootstrap.php';

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    EntityManager::class => function () use ($entityManager) {
        return $entityManager;
    },
    ProductRepository::class => function (ContainerInterface $c) {
        return $c->get(EntityManager::class)->getRepository(App\Domain\Entity\Product::class);
    },
    ProductService::class => function (ContainerInterface $c) {
        return new ProductService($c->get(ProductRepository::class));
    },
    ProductController::class => function (ContainerInterface $c) {
        return new ProductController($c->get(ProductService::class));
    },
]);

$container = $containerBuilder->build();
return $container;
<?php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(
    [__DIR__."/src/Domain/Entity"],
    $isDevMode,
    null,
    null,
    false // Use simple annotation reader
);

$conn = [
    'driver' => $_ENV['DB_DRIVER'],
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'dbname' => $_ENV['DB_DATABASE'],
    'user' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
];

$entityManager = EntityManager::create($conn, $config);
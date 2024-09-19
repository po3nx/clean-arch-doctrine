<?php
require_once __DIR__ . '/../bootstrap.php';

use Doctrine\ORM\Tools\SchemaTool;

// Create Schema
$schemaTool = new SchemaTool($entityManager);
$classes = $entityManager->getMetadataFactory()->getAllMetadata();

try {
    $schemaTool->createSchema($classes);
    echo "Database schema created successfully.\n";
} catch (Exception $e) {
    echo "Error creating database schema: " . $e->getMessage() . "\n";
}
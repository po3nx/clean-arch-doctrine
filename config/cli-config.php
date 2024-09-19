<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

require_once "bootstrap.php";

return ConsoleRunner::createHelperSet($entityManager);
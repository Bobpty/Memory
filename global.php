<?php
require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'vendor', 'autoload.php']);

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$entitiesPath = [
    join(DIRECTORY_SEPARATOR, [__DIR__, "src", "Entity"])
];

$isDevMode = TRUE;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = FALSE;

// Connexion à la base de données
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'host'     => 'localhost',
    'charset'  => 'utf8',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'memory',
);

$config = Setup::createAnnotationMetadataConfiguration(
    $entitiesPath,
    $isDevMode,
    $proxyDir,
        $cache,
        $useSimpleAnnotationReader
);


//$config->addEntityNamespace('', 'src\entity');

$entityManager = EntityManager::create($dbParams, $config);
return $entityManager;
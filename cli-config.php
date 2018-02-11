<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

$entityManager = require_once join(DIRECTORY_SEPARATOR, [__DIR__, 'global.php']);

return ConsoleRunner::createHelperSet($entityManager);
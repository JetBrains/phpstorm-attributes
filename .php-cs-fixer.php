<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->append(['.php-cs-fixer.php'])
    ->notName('PhpStormStubsMap.php');

return (new PhpCsFixer\Config())
    ->setFinder($finder)
    ->setCacheFile(__DIR__ . '/.php_cs.cache');

<?php

use Rector\Config\RectorConfig; 
use RectorLaravel\Set\LaravelSetList;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
$dir = '/var/www/html/app/';
$files = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
foreach ($iterator as $file) {
    // if ($file->isFile() && $file->getExtension() === 'php') {
        $files[] = $file->getPathname();
    // }
}
return RectorConfig::configure()
    ->withSets([
        LaravelSetList::LARAVEL_100
    ])
    ->withAttributesSets(symfony: true, doctrine: true)
    ->withPhpSets(php84: true)
    ->withFileExtensions(['php', 'phtml', 'js', 'blade.php'])
    ->withRules([
        TypedPropertyFromStrictConstructorRector::class
    ])
    ->withPaths($files)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
    );
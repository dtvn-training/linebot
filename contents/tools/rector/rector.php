<?php

use Rector\Config\RectorConfig; 
use RectorLaravel\Set\LaravelSetList;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
use Rector\CodeQuality\Rector\If_\SimplifyIfReturnBoolRector;
// $dir = '/var/www/html/app/';
// $dir_rector = '/var/www/html/tools/rector';
// $utils_rector = '/utils/rector/tests/Rector/';
// $files = [];
// $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
// foreach ($iterator as $file) {
//     // if ($file->isFile() && $file->getExtension() === 'php') {
//         $files[] = $file->getPathname();
//     // }
// }
return RectorConfig::configure()
    ->withSets([
        LaravelSetList::LARAVEL_100
    ])
    // ->withImportNames() # use SHORT NAME , not use FQN 
    // ->withImportNames(importShortClasses: false) # use FQN , no use SHORT NAME
    // ->withSkip([
    //     '/var/www/html/app/Services',
    //     '/var/www/html/app/Rules/SentAtDifference.php',
    //     // or use fnmatch
    //     '/var/www/html/app/*/Tests/*',
    //     // SimplifyIfReturnBoolRector::class,
    // ])
    ->withSkip([
        SimplifyIfReturnBoolRector::class,
    ])
    // ->withSkip([
    //     SimplifyIfReturnBoolRector::class => [
    //         '/var/www/html/app/Services',
    //         '/var/www/html/app/Rules/SentAtDifference.php',
    //     ],
    // ])
    // ->withSets([ 
    //     DoctrineSetList::DOCTRINE_CODE_QUALITY,
    //     $dir_rector . $utils_rector . 'RuleABCRector/config/configured_rule.php',
    //     $dir_rector . $utils_rector . 'RuleAddCommentRector/config/configured_rule.php'
    // ])
    ->withAttributesSets(symfony: true, doctrine: true)
    ->withPhpSets(php84: true)
    ->withRules([
        TypedPropertyFromStrictConstructorRector::class
    ])
    // ->withPaths($files)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
    )
    ->withFileExtensions(['php', 'phtml', 'js', 'blade.php']);


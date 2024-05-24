<?php

use Rector\CodeQuality\Rector\LogicalAnd\AndAssignsToSeparateLinesRector;
use Rector\Config\RectorConfig; 
use Rector\Set\ValueObject\SetList;
use Rector\Set\ValueObject\LevelSetList;
use RectorLaravel\Set\LaravelSetList;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
use Rector\CodeQuality\Rector\If_\SimplifyIfReturnBoolRector;
use Rector\Set\ValueObject\DowngradeLevelSetList;
use Utils\Rector\Rector\RuleAddCommentRector;
use Rector\Renaming\Rector\Name\RenameClassRector;

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
    ->withPhpSets(php84: true)
    ->withSets([

        // LaravelSetList::LARAVEL_100,
        // LaravelSetList::LARAVEL_110,
        // LevelSetList::UP_TO_PHP_82,
        // DowngradeLevelSetList::DOWN_TO_PHP_74, # rector downgrade 

        // SetList::PHP_71,
        // SetList::PHP_72,
        // SetList::PHP_73,
        // SetList::PHP_74,
        // SetList::PHP_80,
        // SetList::PHP_81,
        // SetList::PHP_82,
        // SetList::PHP_83,

        // SetList::PHP_74,
        // SetList::PHP_80,
        // SetList::PHP_82,
        // SetList::PHP_54,
        // SetList::PHP_55,
    ])
    // ->withSets([
    //     LaravelSetList::LARAVEL_100,

    //     LevelSetList::UP_TO_PHP_53,
    //     LevelSetList::UP_TO_PHP_54, 
    //     LevelSetList::UP_TO_PHP_55,
    //     LevelSetList::UP_TO_PHP_56,
    //     LevelSetList::UP_TO_PHP_70,
    //     LevelSetList::UP_TO_PHP_72,
    //     LevelSetList::UP_TO_PHP_73,
    //     LevelSetList::UP_TO_PHP_74,
    //     LevelSetList::UP_TO_PHP_80,
    //     LevelSetList::UP_TO_PHP_81,
    //     LevelSetList::UP_TO_PHP_82,
    //     LevelSetList::UP_TO_PHP_83,
    //     LevelSetList::UP_TO_PHP_84,
        
    //     DowngradeLevelSetList::DOWN_TO_PHP_72 # rector downgrade 
    // ])
    // ->withImportNames() # use SHORT NAME , not use FQN 
    // ->withImportNames(importShortClasses: false) # use FQN , no use SHORT NAME
    // ->withConfiguredRule(RenameClassRector::class, [
    //     'App\Services\AdminService' => 'App\Services\NewAdminService',
    // ])
    ->withSkip([
        '/project/vendor',
        '/project/tools',
        // '/var/www/html/app/Services',
        // '/var/www/html/app/Services',
        // '/var/www/html/app/Rules/SentAtDifference.php',
        // or use fnmatch
        // '/var/www/html/app/*/Tests/*',
        // SimplifyIfReturnBoolRector::class,
    ])
    // ->withSkip([
    //     SimplifyIfReturnBoolRector::class,
    // ])
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
    // ->withRules([
    //     RuleAddCommentRector::class,
    // ])
    // ->withPaths($files)
    ->withFileExtensions(['php', 'phtml']);


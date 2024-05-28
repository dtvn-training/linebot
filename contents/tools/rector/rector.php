<?php

use Rector\CodeQuality\Rector\LogicalAnd\AndAssignsToSeparateLinesRector;
use Rector\CodingStyle\Rector\FuncCall\ArraySpreadInsteadOfArrayMergeRector;
use Rector\CodingStyle\Rector\FuncCall\CallUserFuncArrayToVariadicRector;
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
    ->withPhpSets(php80: true)
    ->withSets([
        // DowngradeLevelSetList::DOWN_TO_PHP_82,
        // DowngradeLevelSetList::DOWN_TO_PHP_81,
        // DowngradeLevelSetList::DOWN_TO_PHP_80,
        // DowngradeLevelSetList::DOWN_TO_PHP_74,
        // DowngradeLevelSetList::DOWN_TO_PHP_73,
        // DowngradeLevelSetList::DOWN_TO_PHP_72,
        // DowngradeLevelSetList::DOWN_TO_PHP_71,

        LaravelSetList::LARAVEL_50, 
        LaravelSetList::LARAVEL_51, 
        LaravelSetList::LARAVEL_52, 
        LaravelSetList::LARAVEL_53, 
        LaravelSetList::LARAVEL_54, 
        LaravelSetList::LARAVEL_55, 
        LaravelSetList::LARAVEL_56, 
        LaravelSetList::LARAVEL_57, 
        LaravelSetList::LARAVEL_58, 
        LaravelSetList::LARAVEL_60, 
        LaravelSetList::LARAVEL_70, 
        LaravelSetList::LARAVEL_80, 
        LaravelSetList::LARAVEL_90, 
        LaravelSetList::LARAVEL_100, 
        LaravelSetList::LARAVEL_110, 

        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::DEAD_CODE,
        SetList::STRICT_BOOLEANS,
        SetList::GMAGICK_TO_IMAGICK,
        SetList::NAMING,
        SetList::PRIVATIZATION,
        SetList::TYPE_DECLARATION,
        SetList::EARLY_RETURN,
        SetList::INSTANCEOF,

        SetList::PHP_52,
        SetList::PHP_53,
        SetList::PHP_54,
        SetList::PHP_55,
        SetList::PHP_56,
        SetList::PHP_70,
        SetList::PHP_71,
        SetList::PHP_72,
        SetList::PHP_73,
        SetList::PHP_74,
        SetList::PHP_80,
        SetList::PHP_81,
        SetList::PHP_82,
        SetList::PHP_83,
        SetList::PHP_84,

        // LevelSetList::UP_TO_PHP_53,
        // LevelSetList::UP_TO_PHP_54, 
        // LevelSetList::UP_TO_PHP_55,
        // LevelSetList::UP_TO_PHP_56,
        // LevelSetList::UP_TO_PHP_70,
        // LevelSetList::UP_TO_PHP_72,
        // LevelSetList::UP_TO_PHP_73,
        // LevelSetList::UP_TO_PHP_74,
        // LevelSetList::UP_TO_PHP_80,
        // LevelSetList::UP_TO_PHP_81,
        // LevelSetList::UP_TO_PHP_82,
        // LevelSetList::UP_TO_PHP_83,
        LevelSetList::UP_TO_PHP_84,
    ])
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
    ->withRules([
        ArraySpreadInsteadOfArrayMergeRector::class,
        CallUserFuncArrayToVariadicRector::class,
    ])
    // ->withPaths($files)
    // ->withAttributesSets(symfony: true, doctrine: true)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        naming: true,
        instanceOf: true,
        earlyReturn: true,
        strictBooleans: true,
    )
    ->withFileExtensions(['php', 'phtml']);


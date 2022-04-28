<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Php80\Rector\Class_\AnnotationToAttributeRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;


return static function (\Rector\Config\RectorConfig $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::AUTO_IMPORT_NAMES, true);

    // is there a file you need to skip?
    $containerConfigurator->skip([
        // single file
//        __DIR__ . '/src/ComplicatedFile.php',
        // or directory
//        __DIR__ . '/src',
        // or fnmatch
//        __DIR__ . '/src/*/Tests/*',

        // is there single rule you don't like from a set you use?
        AnnotationToAttributeRector::class,

        // or just skip rule in specific directory
//        SimplifyIfReturnBoolRector::class => [
            // single file
//            __DIR__ . '/src/ComplicatedFile.php',
            // or directory
//            __DIR__ . '/src',
            // or fnmatch
//            __DIR__ . '/src/*/Tests/*',
//        ],
    ]);
    // Define what rule sets will be applied
//    $containerConfigurator->import(SetList::PHP_74);
    $containerConfigurator->import(SetList::PHP_80);
    $containerConfigurator->import(SetList::CODE_QUALITY);
    $containerConfigurator->import(SetList::DEAD_CODE);

    $containerConfigurator->import(SymfonySetList::SYMFONY_54);
    $containerConfigurator->import(SymfonySetList::SYMFONY_CODE_QUALITY);

    $containerConfigurator->import(PHPUnitSetList::PHPUNIT_91);
    $containerConfigurator->import(PHPUnitSetList::PHPUNIT_CODE_QUALITY);

    $containerConfigurator->import(SetList::TYPE_DECLARATION_STRICT);

    // get services (needed for register a single rule)
//    $services = $containerConfigurator->services();

    // register a single rule
//    $services->set(TypedPropertyRector::class);
};

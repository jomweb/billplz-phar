<?php

declare(strict_types=1);

/*
 * This file is part of the box project.
 *
 * (c) Kevin Herrera <kevin@herrera.io>
 *     Théo Fidry <theo.fidry@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace KevinGH\Box\Composer;

use Composer\Factory;
use Composer\IO\NullIO;
use Composer\Repository\InstalledRepositoryInterface;
use Humbug\PhpScoper\Autoload\ScoperAutoloadGenerator;
use Humbug\PhpScoper\Whitelist;
use RuntimeException;
use Throwable;
use const PHP_EOL;
use function KevinGH\Box\FileSystem\dump_file;
use function KevinGH\Box\FileSystem\file_contents;
use function preg_replace;
use function str_replace;

/**
 * @private
 */
final class ComposerOrchestrator
{
    private function __construct()
    {
    }

    public static function dumpAutoload(Whitelist $whitelist, string $prefix): void
    {
        try {
            $composer = Factory::create(new NullIO(), null, true);

            $installationManager = $composer->getInstallationManager();
            /** @var InstalledRepositoryInterface $localRepository */
            $localRepository = $composer->getRepositoryManager()->getLocalRepository();
            $package = $composer->getPackage();
            $composerConfig = $composer->getConfig();

            $generator = $composer->getAutoloadGenerator();
            $generator->setDevMode(false);
            $generator->setClassMapAuthoritative(true);

            $generator->dump($composerConfig, $localRepository, $package, $installationManager, 'composer', true);

            if ('' !== $prefix) {
                $autoloadFile = $composerConfig->get('vendor-dir').'/autoload.php';

                $autoloadContents = self::generateAutoloadStatements(
                    $whitelist,
                    $prefix,
                    file_contents($autoloadFile)
                );

                dump_file($autoloadFile, $autoloadContents);
            }
        } catch (Throwable $throwable) {
            throw new RuntimeException(
                'Could not dump the autoload: '.$throwable->getMessage(),
                $throwable->getCode(),
                $throwable
            );
        }
    }

    private static function generateAutoloadStatements(Whitelist $whitelist, string $prefix, string $autoload): string
    {
        if ([] === $whitelist->toArray()) {
            return $autoload;
        }

        $autoload = str_replace('<?php', '', $autoload);

        $autoload = preg_replace(
            '/return (ComposerAutoloaderInit.+::getLoader\(\));/',
            '\$loader = $1;',
            $autoload
        );

        $whitelistStatements = (new ScoperAutoloadGenerator($whitelist))->dump($prefix);

        $whitelistStatements = preg_replace(
            '/scoper\-autoload\.php \@generated by PhpScoper/',
            '@generated by Humbug Box',
            $whitelistStatements
        );

        $whitelistStatements = preg_replace(
            '/(\s*\\$loader \= .*)/',
            $autoload,
            $whitelistStatements
        );

        return preg_replace(
            '/\n{2,}/m',
            PHP_EOL.PHP_EOL,
            $whitelistStatements
        );
    }
}

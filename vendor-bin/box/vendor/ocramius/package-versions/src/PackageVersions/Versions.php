<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = '__root__';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'amphp/amp' => 'v2.2.0@c6a775a6c9fdd9ca4c909647a19b02d2d11a0568',
  'amphp/byte-stream' => 'v1.6.1@47908f8e8bb2da8af4e59028200758477bc927ea',
  'amphp/parallel' => 'v1.2.0@53aa422eaf89a539b4df58284f7bdf5219e37f66',
  'amphp/parallel-functions' => 'v0.1.3@12e6c602e067b02f78ddf5b720c17e9aa01ad4b4',
  'amphp/parser' => 'v1.0.0@f83e68f03d5b8e8e0365b8792985a7f341c57ae1',
  'amphp/process' => 'v1.1.0@355b1e561b01c16ab3d78fada1ad47ccc96df70e',
  'amphp/sync' => 'v1.0.1@a1d8f244eb19e3e2a96abc4686cebc80995bbc90',
  'beberlei/assert' => 'v3.2.3@65b8152224aef7d3c197d5db05211d4319711b66',
  'composer/semver' => '1.5.0@46d9139568ccb8d9e7cdd4539cab7347568a5e2e',
  'composer/xdebug-handler' => '1.3.3@46867cbf8ca9fb8d60c506895449eb799db1184f',
  'hoa/compiler' => '3.17.08.08@aa09caf0bf28adae6654ca6ee415ee2f522672de',
  'hoa/consistency' => '1.17.05.02@fd7d0adc82410507f332516faf655b6ed22e4c2f',
  'hoa/event' => '1.17.01.13@6c0060dced212ffa3af0e34bb46624f990b29c54',
  'hoa/exception' => '1.17.01.16@091727d46420a3d7468ef0595651488bfc3a458f',
  'hoa/file' => '1.17.07.11@35cb979b779bc54918d2f9a4e02ed6c7a1fa67ca',
  'hoa/iterator' => '2.17.01.10@d1120ba09cb4ccd049c86d10058ab94af245f0cc',
  'hoa/math' => '1.17.05.16@7150785d30f5d565704912116a462e9f5bc83a0c',
  'hoa/protocol' => '1.17.01.14@5c2cf972151c45f373230da170ea015deecf19e2',
  'hoa/regex' => '1.17.01.13@7e263a61b6fb45c1d03d8e5ef77668518abd5bec',
  'hoa/stream' => '1.17.02.21@3293cfffca2de10525df51436adf88a559151d82',
  'hoa/ustring' => '4.17.01.16@e6326e2739178799b1fe3fdd92029f9517fa17a0',
  'hoa/visitor' => '2.17.01.16@c18fe1cbac98ae449e0d56e87469103ba08f224a',
  'hoa/zformat' => '1.17.01.10@522c381a2a075d4b9dbb42eb4592dd09520e4ac2',
  'humbug/box' => '3.8.0@e7d8df3e38886bc51ba757ea4717fa60bcb30e48',
  'humbug/php-scoper' => '0.12.3@e69999927460a403f8f07bc91b1db2ff2fe934ce',
  'jetbrains/phpstorm-stubs' => 'v2019.1@9e309771f362e979ecfb429303ad7a402c657234',
  'justinrainbow/json-schema' => '5.2.8@dcb6e1006bb5fd1e392b4daa68932880f37550d4',
  'nikic/iter' => 'v2.0.0@1417341030a43fba0764486f7ad49ccc7b76e73f',
  'nikic/php-parser' => 'v4.2.4@97e59c7a16464196a8b9c77c47df68e4a39a45c4',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'opis/closure' => '3.4.0@60a97fff133b1669a5b1776aa8ab06db3f3962b7',
  'paragonie/constant_time_encoding' => 'v2.2.3@55af0dc01992b4d0da7f6372e2eac097bbbaffdb',
  'paragonie/pharaoh' => 'v0.5.0@060418e946de2f39a3618ad70d9b6d0a61437b83',
  'paragonie/random_compat' => 'v9.99.99@84b4dfb120c6f9b4ff7b3685f9b8f1aa365a0c95',
  'paragonie/sodium_compat' => 'v1.11.1@a9f968bc99485f85f9303a8524c3485a7e87bc15',
  'phpdocumentor/reflection-common' => '1.0.1@21bdeb5f65d7ebf9f43b1b25d404f87deab5bfb6',
  'phpdocumentor/reflection-docblock' => '4.3.2@b83ff7cfcfee7827e1e78b637a5904fe6a96698e',
  'phpdocumentor/type-resolver' => '0.4.0@9c977708995954784726e25d0cd1dddf4e65b0f7',
  'phpseclib/phpseclib' => '2.0.21@9f1287e68b3f283339a9f98f67515dd619e5bf9d',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/log' => '1.1.0@6c001f1daafa3a3ac1d8ff69ee4db8e799a654dd',
  'roave/better-reflection' => '3.5.0@a93d26f6f08add54943d752dad1da64c464c2e69',
  'roave/signature' => '1.0.0@bed4ecbdd7f312ab6bb39561ac191f520bcee386',
  'seld/jsonlint' => '1.7.1@d15f59a67ff805a44c50ea0516d2341740f81a38',
  'symfony/console' => 'v4.3.4@de63799239b3881b8a08f8481b22348f77ed7b36',
  'symfony/filesystem' => 'v4.3.4@9abbb7ef96a51f4d7e69627bc6f63307994e4263',
  'symfony/finder' => 'v4.3.4@86c1c929f0a4b24812e1eb109262fc3372c8e9f2',
  'symfony/polyfill-ctype' => 'v1.12.0@550ebaac289296ce228a706d0867afc34687e3f4',
  'symfony/polyfill-mbstring' => 'v1.12.0@b42a2f66e8f1b15ccf25652c3424265923eb4f17',
  'symfony/polyfill-php72' => 'v1.12.0@04ce3335667451138df4307d6a9b61565560199e',
  'symfony/polyfill-php73' => 'v1.12.0@2ceb49eaccb9352bff54d22570276bb75ba4a188',
  'symfony/process' => 'v4.3.4@e89969c00d762349f078db1128506f7f3dcc0d4a',
  'symfony/service-contracts' => 'v1.1.6@ea7263d6b6d5f798b56a45a5b8d686725f2719a3',
  'symfony/var-dumper' => 'v4.3.4@641043e0f3e615990a0f29479f9c117e8a6698c6',
  'ulrichsg/getopt-php' => '3.2.2@9df490db25bd192d074f5de4210e232a8ddbeda0',
  'webmozart/assert' => '1.5.0@88e6d84706d09a236046d686bbea96f07b3a34f4',
  'webmozart/path-util' => '2.3.0@d939f7edc24c9a1bb9c0dee5cb05d8e859490725',
  '__root__' => 'dev-master@630ad70bf3821089aa4aa9e8a08c9e83776cf06c',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}

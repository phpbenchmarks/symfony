<?php

declare(strict_types=1);

namespace PhpBenchmarks\BenchmarkConfiguration;

class Configuration
{
    public static function getComponentType(): int
    {
        return 2;
    }

    public static function getComponentName(): string
    {
        return 'Symfony';
    }

    public static function getComponentSlug(): string
    {
        return 'symfony';
    }

    public static function isCompatibleWithPhp(int $major, int $minor): bool
    {
        return $major === 7 && $minor >= 2;
    }

    public static function getBenchmarkUrl(): string
    {
        return '/benchmark/helloworld';
    }

    public static function getCoreDependencyName(): string
    {
        return 'symfony/framework-bundle';
    }

    public static function getCoreDependencyMajorVersion(): int
    {
        return 5;
    }

    public static function getCoreDependencyMinorVersion(): int
    {
        return 0;
    }

    public static function getCoreDependencyPatchVersion(): int
    {
        return 0;
    }

    public static function getBenchmarkType(): int
    {
        return 1;
    }

    public static function getSourceCodeUrls(): array
    {
        return [
            'route' => 'https://github.com/phpbenchmarks/symfony/tree/5.0.0.1/config/routes.yaml',
            'controller' => 'https://github.com/phpbenchmarks/symfony/tree/5.0.0.1/src/Controller/HelloWorldController.php'
        ];
    }
}

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
        return $major === 7 && $minor >= 1;
    }

    public static function getBenchmarkUrl(): string
    {
        return '/benchmark/rest';
    }

    public static function getCoreDependencyName(): string
    {
        return 'symfony/framework-bundle';
    }

    public static function getCoreDependencyMajorVersion(): int
    {
        return 4;
    }

    public static function getCoreDependencyMinorVersion(): int
    {
        return 4;
    }

    public static function getCoreDependencyPatchVersion(): int
    {
        return 0;
    }

    public static function getBenchmarkType(): int
    {
        return 3;
    }

    public static function getSourceCodeUrls(): array
    {
        return [
            'route' => 'https://github.com/phpbenchmarks/symfony/tree/4.4.0.3/config/routes.yaml#L1',
            'controller' => 'https://github.com/phpbenchmarks/symfony/tree/4.4.0.3/src/Controller/RestApiController.php',
            'randomizeLanguageDispatchEvent' => 'https://github.com/phpbenchmarks/symfony/tree/4.4.0.3/src/Controller/RestApiController.php#L15',
            'randomizeLanguageEventListener' => 'https://github.com/phpbenchmarks/symfony/tree/4.4.0.3/src/EventSubscriber/DefineLocaleEventSubscriber.php',
            'translations' => 'https://github.com/phpbenchmarks/symfony/tree/4.4.0.3/translations/phpbenchmarks.en_GB.yaml',
            'translate' => 'https://github.com/phpbenchmarks/symfony/tree/4.4.0.3/src/Normalizer/UserNormalizer.php#L48',
            'serialize' => 'https://github.com/phpbenchmarks/symfony/tree/4.4.0.3/src/Normalizer/UserNormalizer.php#L42'
        ];
    }
}

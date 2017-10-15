<?php

namespace PhpBenchmarks\Bundle\RestBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AddTranslationsPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->findDefinition('translator');
        $definition->addMethodCall(
            'addResource',
            ['yml', __DIR__ . '/../../../../Translation/phpbenchmarks.en.yml', 'en', 'phpbenchmarks']
        );
        $definition->addMethodCall(
            'addResource',
            ['yml', __DIR__ . '/../../../../Translation/phpbenchmarks.en_GB.yml', 'en_GB', 'phpbenchmarks']
        );
        $definition->addMethodCall(
            'addResource',
            ['yml', __DIR__ . '/../../../../Translation/phpbenchmarks.fr_FR.yml', 'fr_FR', 'phpbenchmarks']
        );
    }
}

<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new PhpBenchmarksSymfony\SmallOverloadBundle\SmallOverloadBundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload1Bundle\Overload1Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload2Bundle\Overload2Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload3Bundle\Overload3Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload4Bundle\Overload4Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload5Bundle\Overload5Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload6Bundle\Overload6Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload7Bundle\Overload7Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload8Bundle\Overload8Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload9Bundle\Overload9Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload10Bundle\Overload10Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload11Bundle\Overload11Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload12Bundle\Overload12Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload13Bundle\Overload13Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload14Bundle\Overload14Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload15Bundle\Overload15Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload16Bundle\Overload16Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload17Bundle\Overload17Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload18Bundle\Overload18Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload19Bundle\Overload19Bundle(),
            new PhpBenchmarksSymfony\OverloadBundles\Overload20Bundle\Overload20Bundle()
        ];
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        return dirname(__DIR__) . '/var/cache/' . $this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname(__DIR__) . '/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config.yml');
    }
}

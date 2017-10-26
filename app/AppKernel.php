<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    /** @var string[] */
    protected $bundleClasses;

    /**
     * @param string $environment
     * @param bool $debug
     * @param string[] $bundleClasses
     */
    public function __construct($environment, $debug, array $bundleClasses = [])
    {
        parent::__construct($environment, $debug);

        $this->bundleClasses = $bundleClasses;
    }

    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
        );
        foreach ($this->bundleClasses as $bundleClass) {
            $bundles[] = new $bundleClass();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}

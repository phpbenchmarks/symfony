<?php

namespace PhpBenchmarks\EventListener;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Translation\TranslatorInterface;

class DefineLocaleEventListener
{
    const EVENT_NAME = 'defineLocale';

    /** @var RequestStack */
    protected $requestStack;

    /** @var TranslatorInterface */
    protected $translator;

    public function __construct(RequestStack $requestStack, TranslatorInterface $translator)
    {
        $this->requestStack = $requestStack;
        $this->translator = $translator;
    }

    public function onDefineLocale()
    {
        $locales = ['fr_FR', 'en_GB', 'aa_BB'];
        $locale = $locales[rand(0, 2)];

        $this->requestStack->getCurrentRequest()->setLocale($locale);
        $this->translator->setLocale($locale);
    }
}

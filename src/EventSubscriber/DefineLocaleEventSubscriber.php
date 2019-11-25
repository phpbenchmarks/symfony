<?php

namespace App\EventSubscriber;

use App\Event\DefineRandomLocaleEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\Translation\TranslatorInterface;

class DefineLocaleEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [DefineRandomLocaleEvent::EVENT_NAME => ['defineRandomLocale']];
    }

    /** @var RequestStack */
    protected $requestStack;

    /** @var TranslatorInterface */
    protected $translator;

    public function __construct(RequestStack $requestStack, TranslatorInterface $translator)
    {
        $this->requestStack = $requestStack;
        $this->translator = $translator;
    }

    public function defineRandomLocale(): void
    {
        $locales = ['fr_FR', 'en_GB', 'aa_BB'];
        $locale = $locales[rand(0, 2)];

        $this->requestStack->getCurrentRequest()->setLocale($locale);
        $this->translator->setLocale($locale);
    }
}

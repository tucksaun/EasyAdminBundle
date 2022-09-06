<?php

namespace EasyCorp\Bundle\EasyAdminBundle\EventListener;

use EasyCorp\Bundle\EasyAdminBundle\Config\Option\EA;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Twig\Environment;

class EasyAdminContextVariableListener
{
    private $requestStack;

    private $twig;

    public function __construct(RequestStack $requestStack, Environment $twig)
    {
        $this->requestStack = $requestStack;
        $this->twig = $twig;
    }

    public function onKernelView(ViewEvent $event)
    {
        if ($context = $this->requestStack->getCurrentRequest()?->attributes->get(EA::CONTEXT_REQUEST_ATTRIBUTE)) {
            $this->twig->addGlobal('ea', $context);
        }
    }
}

<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Twig;

use EasyCorp\Bundle\EasyAdminBundle\Config\Option\EA;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use Symfony\Component\HttpFoundation\RequestStack;

class EasyAdminContextVariableFactory
{
    public function __construct(private RequestStack $requestStack)
    {
    }

    public function __invoke(): ?AdminContext
    {
        return $this->requestStack->getCurrentRequest()?->attributes->get(EA::CONTEXT_REQUEST_ATTRIBUTE);
    }
}

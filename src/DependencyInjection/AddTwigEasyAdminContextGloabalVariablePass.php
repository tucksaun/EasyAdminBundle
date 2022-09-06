<?php

namespace EasyCorp\Bundle\EasyAdminBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class AddTwigEasyAdminContextGloabalVariablePass implements \Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        // this makes the AdminContext available in all templates as a short named variable
        $container->findDefinition('twig')->addMethodCall('addGlobal', ['ea', new Reference('easyadmin.twig.ea_context_variable')]);
    }
}

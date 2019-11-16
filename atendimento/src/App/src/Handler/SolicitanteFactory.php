<?php

namespace App\Handler;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class SolicitanteFactory
{
    public function __invoke(ContainerInterface $container)
    {
    	$solicitanteTable = $container->get(\App\Model\SolicitanteTable::class);
        $template = $container->get(TemplateRendererInterface::class);

        return new SolicitanteHandler($solicitanteTable, $template);
    }
}

<?php

namespace App\Model;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class SolicitanteTableFactory
{
    public function __invoke(ContainerInterface $container)
    {
    	$adapter = $container->get(\Zend\Db\Adapter\Adapter::class);
    	$tableGateway = new \Zend\Db\TableGateway\TableGateway('solicitantes',$adapter);
        return new SolicitanteTable($tableGateway);
    }
}

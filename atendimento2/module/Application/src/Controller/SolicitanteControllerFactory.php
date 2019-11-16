<?php

declare(strict_types=1);

namespace Application\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SolicitanteControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = NULL)
    {
        $solicitanteTable = $container->get(\Application\Model\SolicitanteTable::class);

        return new SolicitanteController($solicitanteTable);
    }

    public function createService(ServiceLocatorInterface $serviceLocator) {}
}

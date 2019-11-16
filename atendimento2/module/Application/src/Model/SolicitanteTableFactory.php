<?php

declare(strict_types=1);

namespace Application\Model;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SolicitanteTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = NULL)
    {
        $adapter = $container->get(\Zend\Db\Adapter\Adapter::class);
        $tableGateway = new \Zend\Db\TableGateway\TableGateway('solicitantes', $adapter);

        return new SolicitanteTable($tableGateway);
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    { }
}

<?php

declare(strict_types=1);

namespace Application\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AssuntoControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = NULL)
    {
        $assuntoTable = $container->get(\Application\Model\AssuntoTable::class);

        return new AssuntoController($assuntoTable);
    }

    public function createService(ServiceLocatorInterface $serviceLocator) {}
}

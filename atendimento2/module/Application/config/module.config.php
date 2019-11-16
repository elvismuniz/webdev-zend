<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\AssuntoControllerFactory;
use Application\Controller\SolicitanteControllerFactory;
use Zend\Mvc\Application;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'solicitante' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/solicitante[/:action[/:cpf]]',
                    'defaults' => [
                        'controller' => Controller\SolicitanteController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'assunto' => [
                'type' => Segment::class,
                'options' => [
                    'route'    => '/assunto[/:action[/:codigo]]',
                    'defaults' => [
                        'controller' => Controller\AssuntoController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\SolicitanteController::class => SolicitanteControllerFactory::class,
            Controller\AssuntoController::class => AssuntoControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'factories' => [
            \Application\Model\SolicitanteTable::class => \Application\Model\SolicitanteTableFactory::class,
            \Application\Model\AssuntoTable::class => \Application\Model\AssuntoTableFactory::class
        ]
    ]
];

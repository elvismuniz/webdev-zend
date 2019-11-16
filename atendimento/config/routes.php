<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

/** @var \Zend\Expressive\Application $app */

$app->get('/', App\Handler\HomePageHandler::class, 'home');
$app->get('/api/ping', App\Handler\PingHandler::class, 'api.ping');
$app->get('/solicitante/novo',App\Handler\SolicitanteHandler::class,'solicitante.novo');
$app->get('/solicitante/editar[/:cpf]',App\Handler\SolicitanteHandler::class,'solicitante.editar');
$app->post('/solicitante/gravar',App\Handler\SolicitanteHandler::class,'solicitante.gravar');
$app->get('/solicitante/listar',App\Handler\SolicitanteHandler::class,'solicitante.listar');
$app->get('/solicitante/excluir/:cpf',App\Handler\SolicitanteHandler::class,'solicitante.excluir');









<?php

namespace App\Handler;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Plates\PlatesRenderer;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\Expressive\ZendView\ZendViewRenderer;
use Psr\Container\ContainerInterface;
use App\Model\SolicitanteTable; 

class SolicitanteHandler implements ServerMiddlewareInterface
{
    private $solicitanteTable;
    private $template;

    public function __construct(SolicitanteTable $solicitanteTable, Template\TemplateRendererInterface $template = null)
    {
        $this->solicitanteTable = $solicitanteTable;
        $this->template = $template;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $data = $request->getParsedBody();
        if (isset($data['cpf']) && isset($data['nome'])){
            $this->solicitanteTable->save($data);
            return $this->getListarResponse();
        }
        if (strpos($request->getUri(),'listar')!==false){
            return $this->getListarResponse();
        }
        if (strpos($request->getUri(),'excluir')!==false){
            $cpf = $request->getAttribute('cpf');
            $this->solicitanteTable->delete($cpf);
            return $this->getListarResponse();
        }                

        $solicitante = [];

        $cpf = $request->getAttribute('cpf');
   
        if (!empty($cpf)) {
            $solicitante = $this->solicitanteTable->get($cpf);
        }

        return new HtmlResponse($this->template->render('solicitante::editar', ['solicitante' => $solicitante]));
    }

    private function getListarResponse()
    {
        $solicitantes = $this->solicitanteTable->getAll();
        return new HtmlResponse($this->template->render('solicitante::listar',['solicitantes' =>$solicitantes]));
    }




}
 
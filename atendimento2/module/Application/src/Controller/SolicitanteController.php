<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Model\Solicitante;
use Application\Model\SolicitanteTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SolicitanteController extends AbstractActionController
{
    /**
     * @var SolicitanteTable
     */
    private $solicitanteTable;

    public function __construct(SolicitanteTable $solicitanteTable)
    {
        $this->solicitanteTable = $solicitanteTable;
    }

    public function indexAction()
    {
        $solicitantes = $this->solicitanteTable->getAll();

        return new ViewModel([
            'solicitantes' => $solicitantes
        ]);
    }

    public function editarAction()
    {
        $cpf = $this->params('cpf');
        $solicitante = new Solicitante();
   
        if (!empty($cpf)) {
            $solicitante = $this->solicitanteTable->get($cpf);
        }

        return new ViewModel([
            'solicitante' => $solicitante
        ]);
    }

    public function gravarAction()
    {
        $solicitante = new Solicitante();
        $solicitante->exchangeArray($_POST);

        if ($solicitante->hasData()) {
            $this->solicitanteTable->save($solicitante);
        }

        return $this->redirect()->toRoute('solicitante');
    }

    public function excluirAction()
    {
        $this->solicitanteTable->delete($this->params('cpf'));

        return $this->redirect()->toRoute('solicitante');
    }
}

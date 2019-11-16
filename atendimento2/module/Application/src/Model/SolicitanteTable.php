<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

/**
 * undocumented class
 */
class SolicitanteTable
{
    /**
     * @var TableGatewayInterface
     */
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function save(Solicitante $model)
    {
        $data = $model->toArray();

        $solicitante = $this->get($model->cpf);

        if (empty($solicitante)) {
            $this->tableGateway->insert($data);
            return;
        }

        $this->tableGateway->update($data, [
            'cpf' => $model->cpf
        ]);
    }

    public function getAll()
    {
        return $this->tableGateway->select(null);
    }
    
    public function get($cpf)
    {
        $result = $this->tableGateway->select(['cpf' => $cpf]);
        return $result->current();
    }

    public function delete($cpf)
    {
        $this->tableGateway->delete(['cpf' => $cpf]);
    }
}

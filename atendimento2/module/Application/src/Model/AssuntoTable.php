<?php

namespace Application\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

/**
 * undocumented class
 */
class AssuntoTable
{
    /**
     * @var TableGatewayInterface
     */
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function save(Assunto $model)
    {
        $data = $model->toArray();

        $assunto = $this->get($model->codigo);

        if (empty($assunto)) {
            $this->tableGateway->insert($data);
            return;
        }

        $this->tableGateway->update($data, [
            'codigo' => $model->codigo
        ]);
    }

    public function getAll()
    {
        return $this->tableGateway->select(null);
    }
    
    public function get($codigo)
    {
        $result = $this->tableGateway->select(['codigo' => $codigo]);
        return $result->current();
    }

    public function delete($codigo)
    {
        $this->tableGateway->delete(['codigo' => $codigo]);
    }
}

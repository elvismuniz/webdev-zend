<?php
namespace App\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

class SolicitanteTable {
	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway){
		$this->tableGateway = $tableGateway;
	}

	public function save(array $data)
	{
        $solicitante = $this->get($data['cpf']);

        if (empty($solicitante)) {
            $this->tableGateway->insert($data);
            return;
		}
		
        $this->tableGateway->update($data, [
            'cpf' => $data['cpf']
        ]);
	}

	public function getAll()
	{
		return $this->tableGateway->select(null);
	}

    public function get($cpf)
    {
		$result = $this->tableGateway->select(['cpf' => $cpf]);
        return $result->toArray()[0] ?? [];
    }

	public function delete($cpf)
	{
		$this->tableGateway->delete(['cpf' => $cpf]);	
	}


}
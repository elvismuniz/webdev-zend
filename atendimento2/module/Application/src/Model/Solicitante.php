<?php

namespace Application\Model;

/**
 * undocumented class
 */
class Solicitante  
{
    public $cpf;
    public $nome;
    public $municipio;
    public $uf;
    public $email;
    public $ddd;
    public $telefone;

    public function exchangeArray($array)
    {
        foreach ($array as $nome => $valor) {
            $this->{$nome} = $valor;
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function hasData()
    {
        return !empty($this->cpf) && !empty($this->nome);
    }
}

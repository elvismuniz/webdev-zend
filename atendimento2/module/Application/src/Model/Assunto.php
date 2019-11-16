<?php

namespace Application\Model;

/**
 * undocumented class
 */
class Assunto  
{
    public $codigo;
    public $assunto;
    public $detalhes;

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
        return !empty($this->assunto);
    }
}

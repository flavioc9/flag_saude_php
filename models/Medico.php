<?php

class Medico{

    public $id_medico;
    public $nome;
    public $morada;
    public $telefone;
    public $id_servico;
    public $id_especialidade;

    public function __construct(string $batatas, string $morada, string $telefone)
    {
        //$this->id_medico;
        $this->nome = $batatas;
        $this->morada = $morada;
        $this->telefone = $telefone;
        //$this->id_servico;
        //$this->id_especialidade;
    }
}

?>
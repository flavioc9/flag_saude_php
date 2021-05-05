<?php

class Medico{

    //propriedade de class
    private static $n_medicos = "medicos";






    //propriedades de instancia
    private $id_medico;
    private $nome;
    private $morada;
    private $telefone;
    private $id_servico;
    private $id_especialidade;

    public function __construct(string $batatas, string $morada, string $telefone)
    {
        $this->nome = $batatas;
        $this->morada = $morada;
        $this->telefone = $telefone;
    }

    //metodo de instancia
    public function getNome(){
        return $this->nome;
    }

    //metodo de instancia
    public function getMorada(){
        return $this->morada;
    }

    //metodo de instancia
    public function getTelefone(){
        return $this->telefone;
    }

    public function setNome(string $nome): void{
        if(strlen($nome) >= 2){
            $this->nome = $nome;
        }

    }

    public static function getTableName(){
        return self::$tableName;
    }


}

?>
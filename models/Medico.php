<?php

class Medico{

    public const tableName = "medicos";

    //propriedade de class
    private static $n_medicos = 0;






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
        self::$n_medicos++;
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

    public static function getNMedicos(){
        return self::$n_medicos;
    }


}

?>
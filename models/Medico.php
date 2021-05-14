<?php

class Medico
{
    const TABLE_NAME = "medicos";
    const ID_FIELD = "id_medico";

    //propriedade de class
    public static $n_medicos = 0;

    //propriedades de instancia
    private $id_medico;
    private $nome;
    private $morada;
    private $telefone;
    private $id_servico;
    private $id_especialidade;

    public function __construct(array $attributes)
    {
        if(!$attributes['nome'] || !$attributes['morada']){
            echo "Aprender a criar uma exception para impedior a criação";
        }

        $this->id_medico = $attributes['id_medico'] ?? null;
        $this->setNome($attributes['nome']);
        $this->morada = $attributes['morada'] ?? null;
        $this->telefone = $attributes['telefone'] ?? null;
        $this->id_servico = $attributes['id_servico'] ?? null;
        $this->id_especialidade = $attributes['id_especialidade'] ?? null;
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

    public function getId(){
        return $this->id_medico;
    }


    public function getEspecialidade(){
        return $this->id_especialidade;
    }


    public function getServico(){
        return $this->id_servico;
    }

    //metodo de instancia
    public function setNome(string $nome): void
    {
        if(strlen($nome) >= 2){
            $this->nome = $nome;
        }
    }

    //metodo de class
    public static function getNMedicos(){
        return self::$n_medicos;
    }

    public function toArray(){
        return get_object_vars($this);
    }

}

?>

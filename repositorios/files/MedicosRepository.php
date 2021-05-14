<?php

require_once '../flag_saude_php/repositorios/RepositoryInterface.php';

class FilesMedicosRepository implements Repository{

    public function findAll() : array
    {
        echo "falta implementacao... mas devia retornar um array de medicos";
        return [];
    }

    public function findById(int $id) : object
    {
        echo "falta implementacao... mas devia retornar um medico";
        return new object;
    }

    public function save(object $model) : bool
    {
        echo "falta implementacao... mas devia retornar um boleano";
        return false;
    }

    public function delete(int $id) : bool
    {
        echo "falta implementacao... mas devia retornar um boleano";
        return false;
    }
}
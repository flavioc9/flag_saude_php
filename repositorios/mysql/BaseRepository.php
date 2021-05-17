<?php

require_once '../flag_saude_php/repositorios/RepositoryInterface.php';
require_once '../flag_saude_php/models/Medico.php';

abstract class MysqlBaseRepository implements Repository {

    protected $model;
    protected $connection;

    public function __construct()
    {
        $this->connection = Database::bdConnect();
    }

    public function findAll(): array
    {
        $stmt = $this->connection->prepare("Select * FROM " . $this->model::TABLE_NAME);
        $stmt->execute();
        $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        $results = [];
        foreach ($rows as $attributes) {
            array_push($results, new $this->model($attributes));
        }

        return $results;
    }

    public function findById(int $id) : object
    {
        $stmt = $this->connection->prepare("Select * FROM " . $this->model::TABLE_NAME . " where ". $this->model::ID_FIELD ." = ? ;");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $attributes = $stmt->get_result()->fetch_assoc();
        // falta corrigir para medicos usarem objectos
        $attributes['especialidade'] = $attributes['id_especialidade']; // criar o objecto especialidade
        $attributes['servico'] = $attributes['id_servico']; // criar o objecto serviço
        return new $this->model($attributes);
    }

}
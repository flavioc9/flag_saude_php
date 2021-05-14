<?php

require_once 'Database.php';
require_once '../flag_saude_php/models/Medico.php';
require_once '../flag_saude_php/repositorios/mysql/BaseRepository.php';

class MysqlMedicosRepository extends MysqlBaseRepository
{

    public function __construct()
    {
        parent::__construct();
        $this->model = Medico::class;
    }

    public function save(object $medico): bool
    {
        if (!($medico instanceof Medico)) {
            return false;
        }

        return $medico->getId() > 0 ? $this->update($medico) : $this->insert($medico); 
    }

    private function insert(Medico $medico): bool
    {
        $array = $medico->toArray();
        $stmt = $this->connection->prepare("INSERT INTO " . Medico::TABLE_NAME . "(nome, morada, telefone, id_especialidade, id_servico) values(?, ?, ?, ?, ?)");
        $stmt->bind_param('sssii', $array["nome"], $array["morada"], $array["telefone"], $array["id_especialidade"], $array["id_servico"]);
        return $stmt->execute();
    }

    private function update(Medico $medico): bool
    {
        $array = $medico->toArray();
        $stmt = $this->connection->prepare("UPDATE ". Medico::TABLE_NAME ."set nome = ?, morada = ?, telefone = ?, id_especialidade = ?, id_servico = ?  WHERE ". Medico::ID_FIELD ." = ?" );
        $stmt->bind_param('sssiii', $array["nome"], $array["morada"], $array["telefone"], $array["id_especialidade"], $array["id_servico"], $array['id_medico']);
        return $stmt->execute();
    }

    public function delete(int $id) : bool
    {
        $stmt = $this->connection->prepare("DELETE FROM ". Medico::TABLE_NAME ." WHERE ". Medico::ID_FIELD ." = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}

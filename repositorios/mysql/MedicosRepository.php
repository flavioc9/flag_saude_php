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

    public function save(object $medico) : bool
    {
        return false;
    }
}

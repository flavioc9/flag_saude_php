<?php

require_once "html/header.phtml";
require_once "models/Especialidade.php";
require_once "repositorios/mysql/EspecialidadesRepository.php";
//require_once "repositorios/Database.php";

$repository = new MysqlEspecialidadeRepository;
$especialidades = $repository->findAll();


require_once "html/especialidades/list.phtml";
require_once "html/footer.phtml";

?>
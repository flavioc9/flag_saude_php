<?php

require_once 'html/header.phtml';
require_once 'models/Medico.php';
require_once 'repositorios/mysql/MedicosRepository.php';

$repository = new MysqlMedicosRepository;

if($_SERVER['REQUEST_METHOD'] === "POST"){
    var_dump($_POST);
    $medico = new Medico($_POST);
    $repository->save($medico);
}


$medicos = $repository->findAll();



echo "Medicos Criados: ". Medico::getNMedicos() ."</br>";
echo "Medicos table: ". Medico::TABLE_NAME ."</br>";

require_once 'html/medicos/list.phtml';
require_once 'html/footer.phtml';

?>
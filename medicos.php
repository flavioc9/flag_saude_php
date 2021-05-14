<?php

require_once 'html/header.phtml';
require_once 'models/Medico.php';
require_once 'repositorios/mysql/MedicosRepository.php';

$repository = new MysqlMedicosRepository;

if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    if($repository->delete($id)){
        echo '<div class="alert alert-success" role="alert"> Foi apagado o user com o id <strong>'.$id.'</strong></div>';
    }
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    var_dump($_POST);
    $medico = new Medico($_POST);
    $repository->save($medico);
}

if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['view_id'])){
    $id = $_GET['view_id'];
    $medico = $repository->findById($id);
    require_once 'html/medicos/view.phtml';
}else if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $medico = $repository->findById($id);
    require_once 'html/medicos/edit.phtml';
}else{
    $medicos = $repository->findAll();
    require_once 'html/medicos/list.phtml';
}

require_once 'html/footer.phtml';

?>
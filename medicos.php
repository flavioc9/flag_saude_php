<?php

require_once 'html/header.phtml';
require_once 'models/Medico.php';
require_once 'repositorios/mysql/MedicosRepository.php';
require_once 'repositorios/mysql/EspecialidadesRepository.php';
require_once 'repositorios/mysql/ServicosRepository.php';
require_once 'services/UploadService.php';

$repository = new MysqlMedicosRepository;
$especialidadesRepository = new MysqlEspecialidadeRepository; 
$servicosRepository = new MysqlServicosRepository;

$template = 'html/medicos/list.phtml';
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    if (isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        if ($repository->delete($id)) {
            echo '<div class="alert alert-success" role="alert"> Foi apagado o user com o id <strong>' . $id . '</strong></div>';
        }
    } else if (isset($_GET['view_id'])) {
        $id = $_GET['view_id'];
        $medico = $repository->findById($id);
        $template = 'html/medicos/view.phtml';
    } else if (isset($_GET['edit_id'])) {
        $id = $_GET['edit_id'];
        $medico = $repository->findById($id);
        $template = 'html/medicos/edit.phtml';
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // gravar imagem
    $filename = uniqid().".jpg";
    $attributes = $_POST;
    $attributes['foto'] = $uploadService->saveFile("images/".$filename, $_FILES['foto']['tmp_name']) ? $filename : null;
    $uploadService = new UploadService;
    $repository->save(new Medico($attributes));
    
}

$medicos = !isset($medico) ? $repository->findAll() : [];
$especialidades = $especialidadesRepository->findAll();
$servicos = $servicosRepository->findAll();
require_once $template;

require_once 'html/footer.phtml';

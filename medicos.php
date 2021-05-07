<?php

require_once "html/header.phtml";
require_once "models/Medico.php";
require_once "repositorios/Database.php";


$connection = Database::bdConnect();
$result = $connection->query("Select * FROM medicos");
$rows = $result->fetch_all(MYSQLI_ASSOC);

foreach($rows as $medico){
    $medicos[] = new Medico($medico["nome"], $medico["morada"], $medico["telefone"], );
}


echo "Medicos Criados: ". Medico::getNMedicos() ."</br>";
echo "Medicos table: ". Medico::tableName ."</br>";



require_once "html/medicos/list.phtml";
require_once "html/footer.phtml";

<?php
require_once "html/header.php";
require_once "models/Medico.php";


$medico_test = new Medico("Márcio Pereira", "Rua de cima, 321", "+351987654321");
$medico_test2 = new Medico("Márcio Pereira 2", "Rua de cima, 321", "+351987654321");

var_dump($medico_test->nome);

?>

<div class="container-fluid">
    <h1 class="mt-4"><?php echo "Flag Saúde APP" ?></h1>
    <p>Bem vindo à nossa super aplicação...</p>
</div>
           
<?php
    require_once "html/footer.php";
?>
<?php

if(isset($_GET['controlador']) && isset($_GET['accion'])){
    $controlador = $_GET['controlador'];
    $accion = $_GET['accion'];   
}else{
    $controlador = 'Producto';
    $accion = 'listar';
}

require_once('Controlador/'.$controlador.'Controlador.php');

$claseControlador = $controlador.'Controlador';
$controlador = new $claseControlador;

$controlador->{$accion}();

?>
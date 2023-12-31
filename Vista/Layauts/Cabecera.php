<?php 

require_once('./Modelo/Producto.php');
require_once('./Controlador/ProductoControlador.php');

?>

<!doctype html>
<html lang="es">

<head>
  <title>Cafeteria Konecta</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
 
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><h3>Cafeteria Konecta</h3></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php?controlador=Producto&accion=listar">Gestionar productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?controlador=Venta&accion=listar">Vender productos</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>

      <br>
      <br>

  </header>
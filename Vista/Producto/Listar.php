<?php

require_once('./Vista/Layauts/Cabecera.php');

?>

<main>
    
    <div class="container">
        <h5>Listado de productos</h5>
        <a class="btn btn-success btn-nueva" href="index.php?controlador=Producto&accion=crearProceso"><i class="fa fa-plus"></i>&nbsp;Crear Producto</a>
        <br><br>
        <table class="table table-bordered grocery-crud-table table-hover">
            <thead class="table-dark">
                <tr>
                    <td>Id</td>
                    <td>Nombre Producto</td>
                    <td>Referencia</td>
                    <td>Precio</td>
                    <td>Peso</td>
                    <td>Categoria</td>
                    <td>Stock</td>
                    <td>Fecha Creacion</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>

                <?php foreach($listaProductos as $value){ ?>

                <tr>
                    <td><?php echo $value->getId(); ?></td>
                    <td><?php echo $value->getNombreProduto(); ?></td>
                    <td><?php echo $value->getReferencia(); ?></td>
                    <td><?php echo $value->getPrecio(); ?></td>
                    <td><?php echo $value->getPeso(); ?></td>
                    <td><?php echo $value->getCategoria(); ?></td>
                    <td><?php echo $value->getStock(); ?></td>
                    <td><?php echo $value->getFechaCreacion(); ?></td>
                    <td>
                        <a class="btn btn-warning" href="index.php?controlador=Producto&accion=editarProceso&id=<?php echo $value->getId(); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Editar</a>
                        <a class="btn btn-danger" href="index.php?controlador=Producto&accion=eliminar&id=<?php echo $value->getId(); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;&nbsp;Eliminar</a>
                    </td>
                </tr>

                <?php } ?>
                

            </tbody>
        </table>
    </div>
</main>

<?php

require_once('./Vista/Layauts/Pie.php');
 ?>
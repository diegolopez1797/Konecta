<?php

require_once('./Vista/Layauts/Cabecera.php');

?>
<div class="container">
    <div class="thin-panel">
        <div class="d-flex justify-content-between">
            <div>
                <h5>Vender producto</h5>
            </div>
            <div>
                <a href="index.php" class="btn btn-info">Volver</a>
            </div>
        </div>
        <hr/>
        <form action="index.php?controlador=Venta&accion=crear" method="post">

            <input type="hidden" name="id" value="<?php echo $producto->getId(); ?>"/>
            <input type="hidden" name="stock" value="<?php echo $producto->getStock(); ?>"/>
            <input type="hidden" name="nombre_producto" value="<?php echo $producto->getNombreProduto(); ?>"/>

            <table class="table table-bordered grocery-crud-table">
            <thead class="table-dark">
                <tr>
                    <td>Nombre Producto</td>
                    <td>Stock</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $producto->getNombreProduto(); ?></td>
                    <td><?php echo $producto->getStock(); ?></td>
                </tr>
            </tbody>
            </table>

            <div class="form-group">
            <label for="cantidad">Cantidad a vender</label>
            <input type="number" name="cantidad" class="form-control" id="cantidad" min="1" pattern="^[0-9]+" required>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Vender producto</button>
        </form>
    </div> 
</div>

<?php

require_once('./Vista/Layauts/Pie.php');

?>
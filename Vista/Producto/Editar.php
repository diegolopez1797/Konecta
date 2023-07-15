<?php

require_once('./Vista/Layauts/Cabecera.php');

?>
<div class="container">
    <div class="thin-panel">
        <div class="d-flex justify-content-between">
            <div>
                <h5>Editar producto</h5>
            </div>
            <div>
                <a href="index.php" class="btn btn-info">Volver</a>
            </div>
        </div>
        <hr/>
        <form action="index.php?controlador=Producto&accion=editar" method="post">

            <input type="hidden" name="id" value="<?php echo $producto->getId(); ?>"/>

            <div class="form-group">
            <label for="nombreProducto">Nombre Producto</label>
            <input type="text" name="nombre_producto" class="form-control" id="nombre_producto" value="<?php echo $producto->getNombreProduto(); ?>" required>
            </div>

            <div class="form-group">
            <label for="direccion">Referencia</label>
            <input type="text" name="referencia" class="form-control" id="referencia" value="<?php echo $producto->getReferencia(); ?>" required>
            </div>

            <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" class="form-control" id="precio" value="<?php echo $producto->getPrecio(); ?>" min="0" pattern="^[0-9]+" required>
            </div>
            
            <div class="form-group">
            <label for="peso">Peso</label>
            <input type="number" name="peso" class="form-control" id="peso" value="<?php echo $producto->getPeso(); ?>" min="0" pattern="^[0-9]+" required>
            </div>

            <div class="form-group">
            <label for="Categoria">Categoria</label>
            <input type="text" name="categoria" class="form-control" id="categoria" value="<?php echo $producto->getCategoria(); ?>" required>
            </div>

            <div class="form-group">
            <label for="fecha">Stock</label>
            <input type="number" name="stock" class="form-control" id="stock" value="<?php echo $producto->getStock(); ?>" min="0" pattern="^[0-9]+" required>
            </div>

            <div class="form-group">
            <label for="fechaCreacion">Fecha Creacion</label>
            <input type="date" name="fecha_creacion" class="form-control" id="fecha_creacion" value="<?php echo $producto->getFechaCreacion(); ?>" required>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Editar producto</button>
        </form>
    </div> 
</div>

<?php

require_once('./Vista/Layauts/Pie.php');

?>
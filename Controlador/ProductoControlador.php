<?php

require_once('./Modelo/Producto.php');

class ProductoControlador {

#Funcion que permite listar todos los productos - Index
public function listar(){

    $listaProductos = Producto::listar();
    require_once('./Vista/Producto/Listar.php');

}

#Funcion que permite crear un producto
public function crear(){

    $nombreProducto = $_POST['nombre_producto'];
    $referencia = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $fechaCreacion = $_POST['fecha_creacion'];

    $producto = new Producto(null,$nombreProducto,$referencia,$precio,$peso,$categoria,$stock,$fechaCreacion);
    $respuesta = Producto::crear($producto);

    if(isset($respuesta)){
        echo "<script>alert('¡ Producto creado exitosamente !')</script>";
    }
    else{
        echo "<script>alert('¡ Ups... No se ha podido guardar el producto. Intentalo nuevamente !')</script>";
    }
        $this->listar();
}

#Funcion que carga el formulario para crear un producto
public function crearProceso(){
   
   require_once('./Vista/Producto/Crear.php');

}


#Funcion que carga el formulario para editar un producto 
public function editarProceso(){

   $id = $_GET['id'];
   $producto = Producto::buscarPorId($id);
   require_once('./Vista/Producto/Editar.php');

}

#Funcion que permite editar un producto
public function editar(){

    $id = $_POST['id'];
    $nombreProducto = $_POST['nombre_producto'];
    $referencia = $_POST['referencia'];
    $precio = $_POST['precio'];
    $peso = $_POST['peso'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $fechaCreacion = $_POST['fecha_creacion'];

    $producto = new Producto($id,$nombreProducto,$referencia,$precio,$peso,$categoria,$stock,$fechaCreacion);
    Producto::editar($producto);

    $this->listar();

}

#Funcion que permite eliminar un producto
public function eliminar(){

    $id = $_GET['id'];
    
    try{
        Producto::Eliminar($id);
    }catch(Exception $e){
        echo "<script>alert('¡ Ups... No se pudo eliminar el producto !')</script>";    
    }

    $this->listar();
}


}

?>

<?php

require_once('./Modelo/Producto.php');
require_once('./Modelo/Venta.php');

class VentaControlador {

#Funcion que permite listar todos los productos para la venta
public function listar(){

    $listaProductos = Producto::listar();
    require_once('./Vista/Venta/Listar.php');

}

#Funcion que permite hacer una venta
public function crear(){

    $idProducto = $_POST['id'];
    $nombreProducto = $_POST['nombre_producto'];
    $stock = $_POST['stock'];
    $cantidad = $_POST['cantidad'];
    $fechaActual = date('Y-m-d');

    #Validacion en la cual se verifica que la cantidad vendida no sea mayor a la del stock
    if($cantidad>$stock){
        echo "<script>alert('¡ La cantidad que intenta vender es mayor a la que hay en stock !')</script>";
        $this->listar();
    }else{

        #Se llama al metodo crear para insentar la informacion de la venta en la tabla venta
        $venta = new Venta(null,$idProducto,$nombreProducto,$cantidad,$fechaActual);
        $respuesta = Venta::crear($venta);

        #Restamos la cantidad vendida y el stock para obtener el nuevo stock
        $nuevoStock = $stock-$cantidad;
        #Se llama al metodo editarStock para actualizar el stock del producto
        Producto::editarStock($idProducto,$nuevoStock);

        if(isset($respuesta)){
            echo "<script>alert('¡ Venta exitosa !')</script>";
        }
        else{
            echo "<script>alert('¡ Ups... No se ha podido realizar la venta. Intentalo nuevamente !')</script>";
        }

    }
        $this->listar();
}

#Funcion que carga el formulario para hacer una venta
public function crearProceso(){
   
    $id = $_GET['id'];
    $producto = Producto::buscarPorId($id);
    require_once('./Vista/Venta/Crear.php');

}


}


?>
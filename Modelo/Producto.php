<?php

require_once('Conexion.php');

class Producto
{
    private $id;
    private $nombreProducto;
    private $referencia;
    private $precio;
    private $peso;
    private $categoria;
    private $stock;
    private $fechaCreacion;

    function __construct($id,$nombreProducto,$referencia,$precio,$peso,$categoria,$stock,$fechaCreacion)
    {
        $this->setId($id);
        $this->setNombreProducto($nombreProducto);
        $this->setReferencia($referencia);
        $this->setPrecio($precio);
        $this->setPeso($peso);
        $this->setCategoria($categoria);
        $this->setStock($stock);
        $this->setFechaCreacion($fechaCreacion);
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombreProduto()
    {
        return $this->nombreProducto;
    }
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }

    public function getReferencia()
    {
        return $this->referencia;
    }
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getPeso()
    {
        return $this->peso;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getStock()
    {
        return $this->stock;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    #Metodo para listar todos los productos
    public static function listar(){

        $listaProducto = [];

        $conn = Conexion::getConnect();
		$select = $conn->query('SELECT * FROM producto order by ID');

		foreach($select->fetchAll() as $producto){
			$listaProducto[] = new Producto($producto['id'],$producto['nombre_producto'],$producto['referencia'],$producto['precio'],$producto['peso'],$producto['categoria'],$producto['stock'],$producto['fecha_creacion']);
		}
		
		return $listaProducto;
    }

    #Metodo para buscar un producto por id
    public static function buscarPorId($id){

		$conn=Conexion::getConnect();
		$select=$conn->prepare('SELECT * FROM producto WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$productoDatos = $select->fetch();

		$producto = new Producto($productoDatos['id'],$productoDatos['nombre_producto'],$productoDatos['referencia'],$productoDatos['precio'],$productoDatos['peso'],$productoDatos['categoria'],$productoDatos['stock'],$productoDatos['fecha_creacion']);
		
		return $producto;

	}

    #Metodo para guardar un producto
	public static function crear($producto){
		
		$conn=Conexion::getConnect();
		$insert=$conn->prepare('INSERT INTO producto VALUES (null,:nombreProducto,:referencia,:precio,:peso,:categoria,:stock,:fechaCreacion)');
		$insert->bindValue('nombreProducto',$producto->getNombreProduto());
        $insert->bindValue('referencia',$producto->getReferencia());
        $insert->bindValue('precio',$producto->getPrecio());
        $insert->bindValue('peso',$producto->getPeso());
        $insert->bindValue('categoria',$producto->getCategoria());
        $insert->bindValue('stock',$producto->getStock());
        $insert->bindValue('fechaCreacion',$producto->getFechaCreacion());
		$insert->execute();

		return $insert;

	}

    #Metodo para actualizar un producto
	public static function editar($producto){
		$conn=Conexion::getConnect();
		$update=$conn->prepare('UPDATE producto SET nombre_producto=:nombreProducto,referencia=:referencia,precio=:precio,peso=:peso,categoria=:categoria,stock=:stock,fecha_creacion=:fechaCreacion WHERE id=:id');
		$update->bindValue('nombreProducto',$producto->getNombreProduto());
        $update->bindValue('referencia',$producto->getReferencia());
        $update->bindValue('precio',$producto->getPrecio());
        $update->bindValue('peso',$producto->getPeso());
        $update->bindValue('categoria',$producto->getCategoria());
        $update->bindValue('stock',$producto->getStock());
        $update->bindValue('fechaCreacion',$producto->getFechaCreacion());
		$update->bindValue('id',$producto->getId());
		$update->execute();
	}

    #Metodo para actualizar el stock de un producto al momento de la venta
	public static function editarStock($id,$stock){
		$conn=Conexion::getConnect();
		$update=$conn->prepare('UPDATE producto SET stock=:stock WHERE id=:id');
        $update->bindValue('stock',$stock);
		$update->bindValue('id',$id);
		$update->execute();
	}

    #Metodo para eliminar un producto
	public static function Eliminar($id){
		$conn=Conexion::getConnect();
		$delete=$conn->prepare('DELETE FROM producto WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		

		return $delete;
	}
}


?>
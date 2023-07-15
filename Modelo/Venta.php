<?php

require_once('Conexion.php');

class Venta
{
    private $id;
    private $idProducto;
    private $nombreProducto;
    private $cantidad;
    private $fechaVenta;


    function __construct($id,$idProducto,$nombreProducto,$cantidad,$fechaVenta)
    {
        $this->setId($id);
        $this->setIdProducto($idProducto);
        $this->setNombreProducto($nombreProducto);
        $this->setCantidad($cantidad);
        $this->setFechaVenta($fechaVenta);

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdProducto()
    {
        return $this->idProducto;
    }
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getFechaVenta()
    {
        return $this->fechaVenta;
    }
    public function setFechaVenta($fechaVenta)
    {
        $this->fechaVenta = $fechaVenta;
    }


    #Metodo para guardar un venta
	public static function crear($venta){
		
		$conn=Conexion::getConnect();
		$insert=$conn->prepare('INSERT INTO venta VALUES (null,:idProducto,:nombreProducto,:cantidad,:fechaVenta)');
		$insert->bindValue('idProducto',$venta->getIdProducto());
        $insert->bindValue('nombreProducto',$venta->getNombreProducto());
        $insert->bindValue('cantidad',$venta->getCantidad());
        $insert->bindValue('fechaVenta',$venta->getFechaVenta());
		$insert->execute();

		return $insert;

	}

}

?>
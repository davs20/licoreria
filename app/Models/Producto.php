<?php


namespace Models;


use Configuracion\Connection;

class Producto{

	public function getProductos(){
		$consulta=Connection::getConnection();
		$result=$consulta->prepare("select * from producto inner join categoria on categoria.id_categoria=producto.categoria_id");
		$result->execute();
		while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
			$array["data"][]=$data;
		}
		return $array;
	}

	public function getProducto($id){
	    $consulta=Connection::getConnection();
		$result=$consulta->prepare("select * from producto where id_producto=:id_producto");
		$result->bindParam(':id_producto',$id);
		$result->execute();	
		return $result->fetchObject();

	}

	public function edit($data){
		$consulta=Connection::getConnection();
		$result=$consulta->prepare("Update producto set nombre_producto=:nombre,descripcion_producto=:descripcion,
categoria_id=:categoria,existencia_producto=:existencia,proveedor_id=:proveedor,
marca_id=:marca,img=:image where id_producto=:id");
	    $result->bindParam(":id",$data["id_producto"]);
        $result->bindParam(":nombre",$data["nombre_producto"]);
        $result->bindParam(":existencia",$data["existencia_producto"]);
        $result->bindParam(":proveedor",$data["proveedor_id"]);
        $result->bindParam(":descripcion",$data["descripcion_producto"]);
        $result->bindParam(":categoria",$data["categoria_id"]);
        $result->bindParam(":marca",$data["marca_id"]);
        $result->bindParam(":image",$data[0],\PDO::PARAM_STR);
	    $result->execute();

	}

	public function disable($id){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Update producto set estado_producto=0 where id_producto=:id");
        $result->bindParam(":id",$id);
        $result->execute();
    }

    public function activate($id){
            $consulta=Connection::getConnection();
            $result=$consulta->prepare("Update producto set estado_producto=1 where id_producto=:id");
            $result->bindParam(":id",$id);
            $result->execute();



    }


    public function crearProducto($data){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Insert into producto (nombre_producto, existencia_producto, proveedor_id, descripcion_producto, categoria_id, marca_id, img) values(:nombre,:existencia,:proveedor,:descripcion,:categoria,:marca,:image) ");
        $result->bindParam(":nombre",$data["nombre_producto"]);
        $result->bindParam(":existencia",$data["existencia_producto"]);
        $result->bindParam(":proveedor",$data["proveedor_id"]);
        $result->bindParam(":descripcion",$data["descripcion_producto"]);
        $result->bindParam(":categoria",$data["categoria_id"]);
        $result->bindParam(":marca",$data["marca_id"]);
        $result->bindParam(":image",$data[0],\PDO::PARAM_STR);
        $result->execute();
    }




}
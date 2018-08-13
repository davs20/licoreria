<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 17/07/2018
 * Time: 18:23
 */

namespace Models;
use Configuracion\Connection;

class Categoria 
{

	public function getCategorias(){
		$conn=Connection::getConnection();
		$consulta=$conn->prepare("select * from categoria ");
		$consulta->execute();
		while ($data = $consulta->fetch(\PDO::FETCH_ASSOC)){
			$array["data"][]=$data;
		}

		return $array;

	}

	public function getCategoria($id){
        $conn=Connection::getConnection();
        $consulta=$conn->prepare("select * from categoria ");
        $consulta->execute();
        return $consulta->fetchObject();

	}

	public function edit($data){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Update categoria set nombre_categoria=:nombre where id_categoria=:id");
        $result->bindParam(":nombre",$data["nombre_categoria"]);
        $result->bindParam(":id",$data["id_categoria"]);
        $result->execute();



    }

	public function disable($id){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Update categoria set estado=0 where id_categoria=:id");
        $result->bindParam(":id",$id);
        $result->execute();

	}

    public function activate($id){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Update categoria set estado=1 where id_categoria=:id");
        $result->bindParam(":id",$id);
        $result->execute();
    }



}
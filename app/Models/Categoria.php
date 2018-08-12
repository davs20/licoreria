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

	}

	public function desable($id){

	}

    public function acivate($id){

    }



}
<?php 
namespace Models;
use Configuracion\Connection;
class Marca
{
	


	public function getMarcas(){
		$consulta=Connection::getConnection();
		$result=$consulta->prepare("select id_marca,nombre_marca,nombre_proveedor,marca.estado_marca,marca.img from marca inner join proveedor  on marca.proveedor_id = proveedor.id_proveedor");
		$result->execute();
		while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
			$array["data"][]=$data;
		}
		return $array;
		
	}

	public function getMarca($id){
		$consulta=Connection::getConnection();
		$result=$consulta->prepare("select * from marca where id_marca=:id_marca");
		$result->bindParam(':id_marca',$id);
		$result->execute();	
		return $result->fetchObject();

	}

    public function edit($data){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Update marca set nombre_marca=:nombre,proveedor_id=:proveedor,
img=:image where id_marca=:id");
        $result->bindParam(":id",$data["id_marca"]);
        $result->bindParam(":nombre",$data["nombre_marca"]);
        $result->bindParam(":proveedor",$data["proveedor_id"]);
        $result->bindParam(":image",$data[0],\PDO::PARAM_STR);
        $result->execute();

    }

    public function crearMarca($data){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Insert into marca (nombre_marca,proveedor_id,img) values(:nombre,proveedor,:image) ");
        $result->bindParam(":nombre",$data["nombre_marca"]);
        $result->bindParam(":proveedor",$data["proveedor_id"]);
        $result->bindParam(":image",$data[0],\PDO::PARAM_STR);
        $result->execute();
    }



}
 ?>
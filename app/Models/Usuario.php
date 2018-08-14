<?php 

namespace Models;
use Configuracion\Connection;
class Usuario 
{

    
    //solo maneja datos
	function __construct()
	{
    

	}

	public function crearUsuario($data){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Insert into usuario (id_usuario, nombre_usuario, apellido_usuario, direccion_usuario, telefono_usuario, rol_id, pass_usuario, img_usuario) VALUES(:id,:nombre,:apellido,:direccion,:telefono,:rol,:pass,:image)");
        $result->bindParam(":id",$data["id_usuario"]);
        $result->bindParam(":nombre",$data["nombre_usuario"]);
        $result->bindParam(":apellido",$data["apellido_usuario"]);
        $result->bindParam(":telefono",$data["telefono_usuario"]);
        $result->bindParam(":direccion",$data["direccion_usuario"]);
        $result->bindParam(":pass",$data["pass"]);
        $result->bindParam(":rol",$data["rol_usuario"]);
        $result->bindParam(":image",$data[0],\PDO::PARAM_STR);
        $result->execute();
    }


	public function getUsuario($user,$pass){
	    $conn=Connection::getConnection();
        $resultl=$conn->prepare("select *,COUNT(*) as cantidad FROM usuario where usuario.id_usuario=:id AND usuario.pass_usuario=:pass");
          $resultl->bindParam(":id",$user);
          $resultl->bindParam(":pass",$pass);
          $resultl->execute();
          $result=$resultl->fetchObject();
          $resultl->closeCursor();
          $resultl=null;
          return $result;

    }

    public function getUsuarios(){
        $conn=Connection::getConnection();
        $resultl=$conn->prepare("select * from usuario");
        $resultl->execute();
        while ($data = $resultl->fetch(\PDO::FETCH_ASSOC)){
            $array["data"][]=$data;
        }
        return $array;



    }
}

 
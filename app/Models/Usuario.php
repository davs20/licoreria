<?php 

namespace Models;
use Configuracion\Connection;
class Usuario 
{

    
    //solo maneja datos
	function __construct()
	{
    

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

 
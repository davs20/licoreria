<?php
namespace Models;
use Configuracion\Connection;
class Proveedor{

    public function getProveedores(){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("select * from proveedor");
        $result->execute();
        while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
            $array["data"][]=$data;
        }
        return $array;

    }

    public function getProveedor($id){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("select * from proveedor where id_proveedor=:id_proveedor");
        $result->bindParam(':id_proveedor',$id);
        $result->execute();
        return $result->fetchObject();

    }

    public function edit($data){
        $consulta=Connection::getConnection();
        if (isset($data[0])){
            $result=$consulta->prepare("Update proveedor set nombre_proveedor=:nombre,direccion_proveedor=:direccion
            ,correo_proveedor=:correo,telefono_proveedor=:telefono,img=:image where id_proveedor=:id");
            $result->bindParam(":image",$data[0]);

        }else{
            $result=$consulta->prepare("Update proveedor set nombre_proveedor=:nombre,direccion_proveedor=:direccion
       ,correo_proveedor=:correo,telefono_proveedor=:telefono where id_proveedor=:id");
        }

        $result->bindParam(":id",$data["id_proveedor"]);
        $result->bindParam(":nombre",$data["nombre_proveedor"]);
        $result->bindParam(":telefono",$data["telefono_proveedor"]);
        $result->bindParam(":direccion",$data["direccion_proveedor"]);
        $result->bindParam(":correo",$data["correo_proveedor"]);
        $result->execute();

    }

    public function disable($id){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Update proveedor set estado=0 where id_proveedor=:id");
        $result->bindParam("id",$id);
        $result->execute();
    }

    public function activate($id){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Update proveedor set estado=1 where id_proveedor=:id");
        $result->bindParam("id",$id);
        $result->execute();
    }


    public function crearProveedor($data){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Insert into proveedor (nombre_proveedor, telefono_proveedor, correo_proveedor, direccion_proveedor, img) VALUES(:nombre,:telefono,:correo,:direccion,:image)");
        $result->bindParam(":nombre",$data["nombre_pro"]);
        $result->bindParam(":telefono",$data["telefono_proveedor"]);
        $result->bindParam(":correo",$data["correo_proveedor"]);
        $result->bindParam(":direccion",$data["direccion_proveedor"]);
        $result->bindParam(":image",$data[0],\PDO::PARAM_STR);
        $result->execute();

    }


}

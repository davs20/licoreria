<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-12-18
 * Time: 07:57 PM
 */

namespace Models;

use Configuracion\Connection;
class Cliente{

    public function getClientes(){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("select * from cliente");
        $result->execute();
        while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
            $array["data"][]=$data;
        }
        return $array;

    }

    public function getCliente($id){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("select * from cliente where id_cliente=:id");
        $result->bindParam(':id',$id);
        $result->execute();
        return $result->fetchObject();

    }

    public function edit($data){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Update cliente set nombre_cliente=:nombre,apellido_cliente=:apellido,telefono_cliente=:telefono,correo_cliente=:correo ");
        $result->bindParam(":id",$data["id_marca"]);
        $result->bindParam(":nombre",$data["nombre_marca"]);
        $result->bindParam(":proveedor",$data["proveedor_id"]);
        $result->bindParam(":image",$data[0],\PDO::PARAM_STR);
        $result->execute();

    }

    public function crearCliente($data){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("Insert into cliente (nombre_cliente, apellido_cliente, telefono_cliente, correo_cliente, img_cliente, direccion_cliente) values(:nombre,:apellido,:telefono,:correo,:image,:direccion) ");
        $result->bindParam(":nombre",$data["nombre_cliente"]);
        $result->bindParam(":apellido",$data["apellido_cliente"]);
        $result->bindParam(":telefono",$data["telefono_cliente"]);
        $result->bindParam(":correo",$data["correo_cliente"]);
        $result->bindParam(":direccion",$data["direccion_cliente"]);
        $result->bindParam(":image",$data[0],\PDO::PARAM_STR);
        $result->execute();
    }




}
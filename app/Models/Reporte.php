<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-13-18
 * Time: 12:40 PM
 */

namespace Models;

use Configuracion\Connection;
class Reporte
{
    public function pedidoReport($data){
        $consulta=Connection::getConnection();
        if ($data["tipo_pedido"]==1){
            $result=$consulta->prepare("select id_transaccion,tipo_transaccion,fecha_transaccion,total_transaccion,id_usuario,persona_id,total_transaccion from transaccion inner join proveedor  on transaccion.persona_id = proveedor.id_proveedor where DATE (transaccion.fecha_transaccion) = DATE (:fecha) AND transaccion.tipo_transaccion=:tipo");

        }else{
            $result=$consulta->prepare("select id_transaccion,tipo_transaccion,fecha_transaccion,total_transaccion,id_usuario,persona_id,total_transaccion from transaccion t inner join cliente c on t.persona_id = c.id_cliente where DATE (t.fecha_transaccion)= DATE (:fecha) AND t.tipo_transaccion=:tipo");
        }

        $time = strtotime($data["fecha_pedido"]);

        $newformat = date('Y-m-d',$time);

         $result->bindParam(":fecha",$newformat,\PDO::PARAM_STR);
         $result->bindParam(":tipo",$data["tipo_pedido"]);
         $result->execute();
         $array=null;
        while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
            $array[]=$data;
        }
        return $array;




    }

    public function pedidoReportinfo($data){
        $consulta=Connection::getConnection();
        if ($data["tipo_transaccion"]==1){
            $result=$consulta->prepare("select t.id_transaccion,t.tipo_transaccion,u.telefono_usuario,t.fecha_transaccion,t.total_transaccion,t.id_usuario,t.persona_id,t.id_usuario,p.nombre_proveedor,p.correo_proveedor,p.telefono_proveedor,u.apellido_usuario,u.nombre_usuario,u.id_usuario from transaccion t inner join proveedor p  on t.persona_id = p.id_proveedor INNER  JOIN usuario u on  u.id_usuario=t.id_usuario where t.id_transaccion=:id");

        }else{
            $result=$consulta->prepare("select t.id_transaccion,t.tipo_transaccion,t.fecha_transaccion,u.telefono_usuario,t.total_transaccion,t.id_usuario,t.persona_id,t.id_usuario,c.nombre_cliente,c.apellido_cliente,u.apellido_usuario,u.nombre_usuario,u.id_usuario from transaccion t inner join cliente c  on t.persona_id = c.id_cliente INNER  JOIN usuario u on  u.id_usuario=t.id_usuario where t.id_transaccion=:id");
        }
        $result->bindParam(":id",$data["id_transaccion"]);
        $result->execute();
        $array=null;
        while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
            $array[]=$data;
        }
        return $array;




    }

    public function existenciaReport($data){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("select p.id_producto as id_producto,p.nombre_producto as nombre_producto, dt.existencia_producto as existencia_product from transaccion t inner join detalle_transaccion dt  on t.id_transaccion = dt.transaccion_id  
        INNER JOIN producto p on dt.id_producto = p.id_producto group by dt.id_producto,p.id_producto  where t.fecha_transaccion=:fecha AND p.id_producto=:id_p");
        $result->execute();
        while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
            $array["data"][]=$data;
        }
        return $array;

    }



}
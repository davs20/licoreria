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
            $result=$consulta->prepare("select id_transaccion,tipo_transaccion,fecha_transaccion,total_transaccion,id_usuario,persona_id,total_transaccion from transaccion inner join proveedor  on transaccion.persona_id = proveedor.id_proveedor where DATE (transaccion.fecha_transaccion) = DATE (:fecha)");

        }else{
            $result=$consulta->prepare("select * from transaccion inner join cliente  on transaccion.persona_id = cliente.id_cliente where DATE (transaccion.fecha_transaccion)= DATE (:fecha)");
        }

        $time = strtotime($data["fecha_pedido"]);

        $newformat = date('Y-m-d',$time);

         $result->bindParam(":fecha",$newformat,\PDO::PARAM_STR);
         $result->execute();
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
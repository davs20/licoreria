<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-12-18
 * Time: 08:40 AM
 */

namespace Models;

use Configuracion\Connection;
class DetallePedido{

    public function getDetallePedidos($data){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("select * from detalle_transaccion inner  join  producto on producto.id_producto=detalle_transaccion.id_producto where  transaccion_id=:id");
        $result->bindParam(":id",$data);
        $result->execute();
        while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
            $array["data"][]=$data;
        }
        return $array;
    }



}
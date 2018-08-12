<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-04-18
 * Time: 10:27 AM
 */

namespace Models;



class Pedido
{
    public function getPedidos(){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("select * from transaccion");
        $result->execute();
        while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
            $array["data"][]=$data;
        }
        return $array;
    }


}
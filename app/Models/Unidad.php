<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-14-18
 * Time: 01:47 AM
 */

namespace Models;

use Configuracion\Connection;


class Unidad{
    public function getUnidades(){
        $consulta=Connection::getConnection();
        $result=$consulta->prepare("select * from unidad");
        $result->execute();
        while ($data = $result->fetch(\PDO::FETCH_ASSOC)){
            $array["data"][]=$data;
        }
        return $array;
    }


}
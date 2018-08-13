<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/07/2018
 * Time: 20:32
 */

namespace Controllers;
use Configuracion\Connection;

class Login{

    public function startSession(){
        $session=Connection::getConnection()->prepare("select * from usuarios");

    }

}
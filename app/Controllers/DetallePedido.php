<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-13-18
 * Time: 08:09 PM
 */

namespace Controllers;

use Models\DetallePedido as ModelsDetallePedido;
class DetallePedido{
    public function show($id){
        $det=ModelsDetallePedido::getDetallePedidos($id);
        echo json_encode($det);

    }


}
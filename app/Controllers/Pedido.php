<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-04-18
 * Time: 10:27 AM
 */

namespace Controllers;

use Models\Pedido as ModelsPedido;
use Models\DetallePedido as ModelsDetallePedido;

class Pedido implements accionControllers
{

    public function showAll()
    {
        $datos=ModelsPedido::getPedidos();
        echo json_encode($datos);

        // TODO: Implement showAll() method.
    }

    public function edit($data)
    {
        // TODO: Implement edit() method.
    }

    public function show($id){
        // TODO: Implement show() method.
    }

    public function disable($id)
    {
        // TODO: Implement disable() method.
    }

    public function create($data){
        ModelsPedido::crearPedido($data);
//        array_push($data,$destino);

        //ModelsDetallePedido::crearDetallePedido($data);
        // TODO: Implement disable() method.
    }
}
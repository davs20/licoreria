<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 08-12-18
 * Time: 07:57 PM
 */

namespace Controllers;

use Controllers\accionControllers;
use Models\Cliente as ModelsCliente;
class Cliente implements accionControllers
{

    public function showAll(){
        $datos=ModelsCliente::getClientes();
        echo json_encode($datos);
        // TODO: Implement showAll() method.
    }

    public function edit($data){
        // TODO: Implement edit() method.
    }

    public function show($id){
        $cliente=ModelsCliente::getCliente($id);
        echo json_encode($cliente);
        // TODO: Implement show() method.
    }

    public function disable($id){
        ModelsCliente::disable($id);
        // TODO: Implement disable() method.
    }

    public function create($data)
    {
        // TODO: Implement create() method.
    }
}
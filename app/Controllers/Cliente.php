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
        ModelsCliente::edit($data);
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

    public function activate($id){
        ModelsCliente::activate($id);
        // TODO: Implement disable() method.
    }

    public function create($data){
        $foto=$data["img"]["name"];
        $ruta=$data["img"]["tmp_name"];
        $destino="app/img/".$foto;
        copy($ruta,$destino);
        array_push($data,$destino);
        ModelsCliente::crearCliente($data);
        // TODO: Implement create() method.
    }
}
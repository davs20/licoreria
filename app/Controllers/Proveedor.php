<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/07/2018
 * Time: 9:11
 */

namespace Controllers;
use Models\Proveedor as ModelsProveedor;


class Proveedor implements accionControllers {


    public function showAll()
    {
        $datos=ModelsProveedor::getProveedores();
        echo json_encode($datos);
        // TODO: Implement showAll() method.
    }

    public function edit($data)
    {
        $foto=$data["img"]["name"];
        $ruta=$data["img"]["tmp_name"];
        $destino="app/img/".$foto;
        copy($ruta,$destino);
        array_push($data,$destino);
        ModelsProveedor::edit($data);
        // TODO: Implement edit() method.
    }

    public function show($id)
    {
        $proveedor=ModelsProveedor::getProveedor($id);
        echo json_encode($proveedor);
        // TODO: Implement show() method.
    }

    public function disable($id){
        ModelsProveedor::disable($id);

        // TODO: Implement disable() method.
    }

    public function create($data){
        $foto=$data["img"]["name"];
        $ruta=$data["img"]["tmp_name"];
        $destino="app/img/".$foto;
        copy($ruta,$destino);
        array_push($data,$destino);
        ModelsProveedor::crearProveedor($data);

    }

    public function activate($data){
        ModelsProveedor::activate($data);
    }




}
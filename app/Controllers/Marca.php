<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 27/07/2018
 * Time: 8:37
 */

namespace Controllers;
use Models\Marca as ModelsMarca;

class Marca implements  accionControllers {

    public function showAll(){
        $datos=ModelsMarca::getMarcas();
        echo json_encode($datos);
    }

    public function edit($data){
        if ($data["img"]!=null){
            $foto=$data["img"]["name"];
            $ruta=$data["img"]["tmp_name"];
            $destino="app/img/".$foto;
            copy($ruta,$destino);
            array_push($data,$destino);
        }

        ModelsMarca::edit($data);
        // TODO: Implement edit() method.
    }

    public function show($id)
    {
        $datos=ModelsMarca::getMarca($id);
        echo json_encode($datos);
    }

    public function disable($id)
    {
        // TODO: Implement disable() method.
    }

    public function create($data){
        $foto=$data["img"]["name"];
        $ruta=$data["img"]["tmp_name"];
        $destino="app/img/".$foto;
        copy($ruta,$destino);
        array_push($data,$destino);
        ModelsMarca::crearMarca($data);

    }
}
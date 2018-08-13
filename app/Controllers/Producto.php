<?php

namespace Controllers;
use Models\Producto as ModelsProductos;
use Configuracion\Connection;
class Producto implements accionControllers{
	static private $con=null;
	
	function __construct(){
    

	}

	public function showAll(){
		$datos=ModelsProductos::getProductos();
		echo json_encode($datos);


	}

    
   public function show($id){
	$producto=ModelsProductos::getProducto($id);
	echo json_encode($producto);

 }

 public function disable($id){
    ModelsProductos::disable($id);
 }

 public function activate($id){
	ModelsProductos::activate($id);
 }

 public function edit($data){
     $foto=$data["img"]["name"];
     $ruta=$data["img"]["tmp_name"];
     $destino="app/img/".$foto;
     copy($ruta,$destino);
     array_push($data,$destino);
 	ModelsProductos::edit($data);

 }

 public function create($data){
     $foto=$data["img"]["name"];
     $ruta=$data["img"]["tmp_name"];
     $destino="app/img/".$foto;
     copy($ruta,$destino);
     array_push($data,$destino);
     ModelsProductos::crearProducto($data);

 }

	
}

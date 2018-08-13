<?php 
/**
 * 
 */

namespace Controllers;
use Controllers\accionControllers;
use Models\Categoria as ModelsCategoria;
class Categoria implements accionControllers{

	
public function showAll(){
	$datos=ModelsCategoria::getCategorias();
	echo json_encode($datos);
}

public function edit($data){
    ModelsCategoria::edit($data);
	

} /// se va a mandar como array
    
public function show($id){
   $categoria=ModelsCategoria::getCategoria($id);
   echo json_encode($categoria);
 }

 public function disable($id){
     ModelsCategoria::disable($id);
    
 }
    public function activate($id){
        ModelsCategoria::activate($id);

    }


    public function create($data)
    {
        ModelsCategoria::crearCategoria($data);

        // TODO: Implement create() method.
    }
}

 ?>
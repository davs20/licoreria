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
	

} /// se va a mandar como array
    
public function show($id){

 }

 public function disable($id){
    
 }


    public function create($data)
    {
        // TODO: Implement create() method.
    }
}

 ?>
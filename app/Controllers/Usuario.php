<?php 
/**
 * 
 */

namespace Controllers;
use Models\Usuario as ModelUsuario;
class Usuario implements accionControllers
{
    protected $ModelUsuario=null;
	
	function __construct()
	{
		$this->ModelUsuario=new ModelUsuario();
		
	}

	public function authLogin($user,$pass){
		$con=new ModelUsuario();
	    $consulta=$con->getUsuario($user,$pass);
	    session_start();
        $hora = date('H:i');
        $_SESSION['user']=$consulta->nombre_usuario." ".$consulta->apellido_usuario;
        $_SESSION["id_user"]=$consulta->id_usuario;
        $session_id = session_id();
        $token = hash('sha256', $hora.$session_id);
        $_SESSION['token'] = $token;
        echo $consulta->cantidad;
	    
    }


    public function showAll(){
       ///esta muestratodo
        $datos=\Models\Usuario::getUsuarios();
        echo json_encode($datos);

        // TODO: Implement showAll() method.
    }

    public function edit($data)
    {
        // TODO: Implement edit() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
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
	    ModelUsuario::crearUsuario($data);
        // TODO: Implement create() method.
    }
}
<?php
require_once "vendor/autoload.php";


use Configuracion\Routing\Router;


$router = new Router($_SERVER['REQUEST_URI']);
Router::$dir_root = "/licoreria";
$router->add('/inicio', function () {
	$_POST["vista"]="inicio";
    include 'app/html/main.php';
},null);

$router->add('/Productos',"Controllers\Producto::showAll",null);
$router->add('/Marcas',"Controllers\Marca::showAll",null);
$router->add('/Categoria',"Controllers\Categoria::showAll",null);


if(isset($_POST["nombre_p"])){
    $router->add('/Producto/Update',"Controllers\Producto::edit",array(
        "data"=> ["id_producto"=>$_POST["id"],
                 "nombre_producto"=>$_POST["nombre_p"],
                 "existencia_producto"=>$_POST["existencia"],
                 "proveedor_id"=>$_POST["proveedor"],
                 "descripcion_producto"=>$_POST["descripcion"],
                 "categoria_id"=>$_POST["categoria"],
                 "marca_id"=>$_POST["marca"],
                 "img"=>$_FILES["img"]
            ]

    ));

    $router->add("/Producto/Create","Controllers\Producto::create",array(
        "data"=> [
            "nombre_producto"=>$_POST["nombre_p"],
            "existencia_producto"=>$_POST["existencia"],
            "proveedor_id"=>$_POST["proveedor"],
            "descripcion_producto"=>$_POST["descripcion"],
            "categoria_id"=>$_POST["categoria"],
            "marca_id"=>$_POST["marca"],
            "img"=>$_FILES["img"]
        ]
    ));
}




if(isset($_POST["id_marca"])){
    $router->add('/Marca/Create',"Controllers\Marca::create",array(
        "data"=> [
            "nombre_marca"=>$_POST["nombre"],
            "proveedor_id"=>$_POST["proveedor"],
            "img"=>$_FILES["img"]
        ]

    ));
    $router->add('/Marca/Update',"Controllers\Marca::edit",array(
    "data"=> ["id_marca"=>$_POST["id"],
        "nombre_marca"=>$_POST["nombre"],
        "proveedor_id"=>$_POST["proveedor"],
        "img"=>$_FILES["img"]
    ]

));
}
if(isset($_POST["tipo_pedido"])){
    $router->add('/Pedido/Create',"Controllers\Pedido::create",array(

        "data"=> [
            "usuario_id_transaccion"=>$_POST["id_usuario_transaccion"],
            "tipo_pedido"=>$_POST["tipo_pedido"],
             "nombre_producto"=>$_POST["nombre_producto"],
           //  "nombre_producto"=>$_POST["nombre_producto[]"],
             "id_producto"=>$_POST["id_producto"],
             "cantidad_producto"=>$_POST["cantidad_producto"],
             "subtotal_producto"=>$_POST["subtotal_producto"]

        ]

    ));
    $router->add('/Pedido/Update',"Controllers\Pedido::edit",array(
        "data"=> [
            "usuario_id_transaccion"=>$_POST["id_usuario_transaccion"],
            "tipo_pedido"=>$_POST["tipo_pedido"]
        ]

    ));
}



if(isset($_POST["nombre_pro"])){
    $router->add("/Proveedor/Create","Controllers\Proveedor::create",array(
        "data"=> ["nombre_proveedor"=>$_POST["nombre_pro"],
            "telefono_proveedor"=>$_POST["telefono"],
            "correo_proveedor"=>$_POST["correo"],
            "direccion_proveedor"=>$_POST["direccion"],
            "img"=>$_FILES["img"]
        ]
    ));
    $router->add("/Proveedor/Update","Controllers\Proveedor::edit",array(
        "data"=> ["nombre_proveedor"=>$_POST["nombre_pro"],
            "telefono_proveedor"=>$_POST["telefono"],
            "correo_proveedor"=>$_POST["correo"],
            "direccion_proveedor"=>$_POST["direccion"],
            "img"=>$_FILES["img"],
            "id_proveedor"=>$_POST["id"]
        ]
    ));
}






$router->add('/Producto/Disable/:id',"Controllers\Producto::disable",null);
$router->add('/Producto/Activate/:id',"Controllers\Producto::activate",null);

$router->add('/Proveedores',"Controllers\Proveedor::showAll",null);
$router->add('/Usuarios',"Controllers\Usuario::showAll",null);
$router->add('/Proveedor/:id',"Controllers\Proveedor::show",null);
$router->add('/Proveedor/Disable/:id',"Controllers\Proveedor::disable",null);
$router->add('/Proveedor/Activate/:id',"Controllers\Proveedor::activate",null);
$router->add('/Categorias',"Controllers\Categoria::showAll",null);
$router->add('/Categoria/Activate/:id',"Controllers\Categoria::activate",null);
$router->add('/Categoria/Disable/:id',"Controllers\Categoria::disable",null);
$router->add('/Producto/:producto',"Controllers\Producto::show",null);
$router->add('/Marca/:marca',"Controllers\Marca::show",null);


$router->add('/', function (){
    include 'app/html/login.php';
},null);


if (isset($_POST["usuario"]) && isset($_POST["pass"])) {
$router->add("/login",'Controllers\Usuario::authLogin',array("user"=>$_POST["usuario"],"pass"=>$_POST["pass"]));	
}









$router->run();



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





if(isset($_POST["fecha_pedido_reporte"])){
    $router->add('/Reporte/Pedido',"Controllers\Reporte::pedidoReport",array(
        "data"=> [
            "fecha_pedido"=>$_POST["fecha_pedido_reporte"],
            "tipo_pedido"=>$_POST["tipo_pedido_reporte"],

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
    "data"=> ["id_marca"=>$_POST["id_marca"],
        "nombre_marca"=>$_POST["nombre"],
        "proveedor_id"=>$_POST["proveedor"],
        "img"=>$_FILES["img"]
    ]

));
}
if(isset($_POST["tipo_pedido"]) ){
    $router->add('/Pedido/Create',"Controllers\Pedido::create",array(

        "data"=> [
            "usuario_id_transaccion"=>$_POST["id_usuario_transaccion"],
            "tipo_pedido"=>$_POST["tipo_pedido"],
             "nombre_producto"=>$_POST["nombre_producto"],
           //  "nombre_producto"=>$_POST["nombre_producto[]"],
             "id_producto"=>$_POST["id_producto"],
             "cantidad_producto"=>$_POST["cantidad_producto"],
             "subtotal_producto"=>$_POST["subtotal_producto"],
             "persona_id"=>$_POST["persona"],
             "total"=>$_POST["total"]

        ]

    ));
    $router->add('/Pedido/Update',"Controllers\Pedido::edit",array(
        "data"=> [
            "usuario_id_transaccion"=>$_POST["id_usuario_transaccion"],
            "tipo_pedido"=>$_POST["tipo_pedido"]
        ]

    ));
}

if (isset($_POST["id_usuario"])){
    $router->add('/Usuario/Create',"Controllers\Usuario::create",array(

        "data"=> [
            "id_usuario"=>$_POST["id_usuario"],
            "nombre_usuario"=>$_POST["nombre_usuario"],
            "apellido_usuario"=>$_POST["apellido_usuario"],
            "pass"=>$_POST["pass"],
            "rol_usuario"=>$_POST["rol_usuario"],
            "telefono_usuario"=>$_POST["telefono_usuario"],
            "direccion_usuario"=>$_POST["direccion_usuario"],
            "img"=>$_FILES["img"]

        ]

    ));

}

if (isset($_POST["id_transaccion_report"])){
    $router->add('/Reporte/Pedidoinfo',"Controllers\Reporte::pedidoReportinfo",array(
        "data"=> [
            "id_transaccion"=>$_POST["id_transaccion_report"],
            "tipo_transaccion"=>$_POST["tipo_transaccion_report"]

        ]

    ));

}

if (isset($_POST["id_cat"])){
    $router->add('/Categoria/Update',"Controllers\Categoria::edit",array(
        "data"=> [
            "nombre_categoria"=>$_POST["nombre_cat"],
            "id_categoria"=>$_POST["id_cat"]

        ]

    ));
    $router->add('/Categoria/Create',"Controllers\Categoria::create",array(
        "data"=> ["nombre_categoria"=>$_POST["nombre_cat"]]

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

if(isset($_POST["nombre_cliente_cl"])){
    $router->add("/Cliente/Create","Controllers\Cliente::create",array(
        "data"=> ["nombre_cliente"=>$_POST["nombre_cliente_cl"],
            "apellido_cliente"=>$_POST["apellido_cliente"],
            "telefono_cliente"=>$_POST["telefono_cliente"],
            "correo_cliente"=>$_POST["correo_cliente"],
            "direccion_cliente"=>$_POST["direccion_cliente"],
            "img"=>$_FILES["img"]
        ]
    ));
    $router->add("/Cliente/Update","Controllers\Cliente::edit",array(
        "data"=> ["nombre_cliente"=>$_POST["nombre_cliente_cl"],
            "telefono_cliente"=>$_POST["telefono_cliente"],
            "correo_cliente"=>$_POST["correo_cliente"],
            "direccion_cliente"=>$_POST["direccion_cliente"],
            "id_cliente"=>$_POST["id_cliente"],
            "img"=>$_FILES["img"]

        ]
    ));
}






$router->add('/Producto/Disable/:id',"Controllers\Producto::disable",null);
$router->add('/Producto/Activate/:id',"Controllers\Producto::activate",null);
$router->add('/PedidosShow',"Controllers\Pedido::showAll",null);
$router->add('/Proveedores',"Controllers\Proveedor::showAll",null);
$router->add('/Clientes',"Controllers\Cliente::showAll",null);
$router->add('/Usuarios',"Controllers\Usuario::showAll",null);
$router->add('/Proveedor/:id',"Controllers\Proveedor::show",null);

$router->add('/DetalleTransaccion/:id',"Controllers\DetallePedido::show",null);
$router->add('/Cliente/:id',"Controllers\Cliente::show",null);
$router->add('/Proveedor/Disable/:id',"Controllers\Proveedor::disable",null);
$router->add('/Proveedor/Activate/:id',"Controllers\Proveedor::activate",null);
$router->add('/Categorias',"Controllers\Categoria::showAll",null);
$router->add('/Unidades',"Controllers\Unidad::showAll",null);
$router->add('/Categoria/:id',"Controllers\Categoria::show",null);
$router->add('/Categoria/Activate/:id',"Controllers\Categoria::activate",null);
$router->add('/Categoria/Disable/:id',"Controllers\Categoria::disable",null);
$router->add('/Cliente/Activate/:id',"Controllers\Cliente::activate",null);
$router->add('/Cliente/Disable/:id',"Controllers\Cliente::disable",null);
$router->add('/Producto/:producto',"Controllers\Producto::show",null);
$router->add('/Marca/:marca',"Controllers\Marca::show",null);


$router->add('/', function (){
    include 'app/html/login.php';
},null);


if (isset($_POST["usuario"]) && isset($_POST["pass"])) {
$router->add("/login",'Controllers\Usuario::authLogin',array("user"=>$_POST["usuario"],"pass"=>$_POST["pass"]));	
}









$router->run();



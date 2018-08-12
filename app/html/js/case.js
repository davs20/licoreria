
var dir="http://localhost/licoreria/app/html/vistas";
$("[href='http://localhost/licoreria/Productos']").click(function(event) {

	event.preventDefault();

	if($(this).children().attr("href")!=='#sub-item-1'){
	 $("#case").empty();
	 $("#case").load(dir+"/productos.php");



	}
});



$("[href='http://localhost/licoreria/Pedidos']").click(function(event) {

    event.preventDefault();

    if($(this).children().attr("href")!=='#sub-item-1'){
        $("#case").empty();
        $("#case").load(dir+"/pedidos.php");



    }
});
$("[href='http://localhost/licoreria/Proveedores']").click(function(event) {

    event.preventDefault();

    if($(this).children().attr("href")!=='#sub-item-1' && $(this).children().attr("href")!=='#sub-item-2'){
        $("#case").empty();
        $("#case").load(dir+"/proveedor.php");
        $(this).attr("class").val("active")


    }
});
$("[href='http://localhost/licoreria/Usuarios']").click(function(event) {

    event.preventDefault();

    if($(this).children().attr("href")!=='#sub-item-1' && $(this).children().attr("href")!=='#sub-item-2'){
        $("#case").empty();
        $("#case").load(dir+"/usuarios.php");
        $(this).attr("class").val("active")


    }
});


$("[href='http://localhost/licoreria/Categorias']").click(function(event) {

    event.preventDefault();

    if($(this).children().attr("href")!=='#sub-item-1' ){
        $("#case").empty();
        $("#case").load(dir+"/categoria.php");



    }
});

$("[href='http://localhost/licoreria/Marcas']").click(function(event) {

    event.preventDefault();

    if($(this).children().attr("href")!=='#sub-item-1'){
        $("#case").empty();
        $("#case").load(dir+"/marca.php");



    }
});



$("[href='http://localhost/licoreria/Salidas']").click(function(event) {

    event.preventDefault();

    if($(this).children().attr("href")!=='#sub-item-1'){
        $("#case").empty();
        $("#case").load(dir+"/salida.php");



    }
});

$("")

// $(".nav menu li").click(function(event) {
//
//     event.preventDefault();
//
//     if($(this).children().attr("href")!=='#sub-item-1' && $(this).children().attr("href")!=='#sub-item-2'){
//         $("#case").empty();
//         $("#case").load($(this).children().attr("href").val());
//
//
//
//     }
// });

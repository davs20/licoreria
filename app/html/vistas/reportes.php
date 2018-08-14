
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
    <h1>Reportes</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Parametros
                    <ul class="pull-right panel-settings panel-button-tab-right">
                        <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                <em class="fa fa-cogs"></em>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <ul class="dropdown-settings">
                                        <li><a href="#">
                                                <em class="fa fa-cog"></em> Entrada
                                            </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                                <em class="fa fa-cog"></em> Salida
                                            </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                                <em class="fa fa-cog"></em> Opcion3
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h4>Pedidos</h4>
                                <form action="" id="pedido">
                                    <div class="form-group">
                                        <label for="">Fecha</label>
                                        <input type="date" name="fecha_pedido_reporte" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo Pedido</label>
                                        <select name="tipo_pedido_reporte" id="">
                                            <option value="0">Seleccione el tipo de Pedido</option>
                                            <option value="1">Entrada</option>
                                            <option value="2">Salida</option>
                                        </select>
                                    </div>
                                    <div id="persona_tipo"></div>
                                    <div class="form-group">

                                        <button type="submit" class="btn-success form-control">Enviar </button>
                                    </div
                                </form>

                            </div>
                            <div class="col-md-6">
                                <h4>Existencia Producto</h4>
                                <form action="" id="existencia">
                                    <div class="form-group">
                                        <label for="">Fecha</label>
                                        <input type="date" name="fecha_producto" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Producto</label>
                                        <select name="producto"  class="selectpicker" data-live-search="true" >

                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <button type="submit" class="btn-success form-control">Enviar </button>
                                    </div
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pedido
                    <ul class="pull-right panel-settings panel-button-tab-right">
                        <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                <em class="fa fa-cogs"></em>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <ul class="dropdown-settings">
                                        <li><a href="#">
                                                <em class="fa fa-cog"></em> Entrada
                                            </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                                <em class="fa fa-cog"></em> Salida
                                            </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                                <em class="fa fa-cog"></em> Opcion3
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="row justify-content-center">
                            <table id="table_transaccion" class="display">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Id Usuario</th>
                                    <th>Valor Transaccion</th>
                                    <th>Destinatario</th>
                                    <th>Opciones</th>


                                </tr>
                                </thead>

                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Reporte</h2>
                    <ul class="pull-right panel-settings panel-button-tab-right">
                        <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                <em class="fa fa-cogs"></em>
                            </a>
                        </li>
                    </ul>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="row">
                            <div class="col-md-5 col-sm-4">
                                <h3 >Transaccion # : </h3><div id="trans"></div>

                                <h3 >Tipo Transaccion:</h3><div id="tipo"></div>
                                <h4 >Fecha Emision</h4><div id="fecha"></div>
                            </div>
                            <div class="col-md-offset-7">
                                <h1>Bodegas Lumino</h1>
                                <h5>Direccion : Parque Placentero</h5>
                                <h5>Website: www.lumino.com</h5>
                                <h5>Numero De telefono : 9977433/22446846</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <hr>
                                <h4>Generado Por</h4>
                                <div class="col-md-2">
                                    <h5 >Nombre:</h5> <div id="nombre_usuario"></div>
                                    <h5 >Correo:</h5><div id="correo_usuario"></div>
                                    <h5>Telefono:</h5><div id="telefono_usuario"></div>
                                </div>


                            </div>
                            <div class="col-md-offset-7">
                                <hr>
                                <h4 id="persona"></h4>
                                <h5 id="nombre_persona">Nombre :</h5>
                                <h5 id="correo_persona">Correo :</h5>
                            </div>
                        </div>
                        <div class="row">
                            <table id="table_producto" class="display">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Cantidad Movida</th>
                                    <th>Unidad</th>
                                    <th>Subtotal</th>
                                    <th>Existencia </th>

                                </tr>
                                </thead>

                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {


        $.ajax({
            url: "http://localhost/licoreria/Productos",
            success: function (data) {
                var datos = jQuery.parseJSON(data);
                $("[name='producto']").append("<option>Seleccione Producto</option>");
                for (var i = 0; i < datos["data"].length; i++) {
                    $("[name='producto']").append("<option data-tokens='"+datos["data"][i]["nombre_producto"]+"' value='" + datos["data"][i]["id_producto"] + "'>" + datos["data"][i]["nombre_producto"] + "</option>");
                }


            }

        });


        $("#pedido").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url:"http://localhost/licoreria/Reporte/Pedido",
                data:$(this).serialize(),
                type:"post",
                success:function (data) {
                    var result = jQuery.parseJSON(data);
                    var tablaPedido = $('#table_transaccion').DataTable({
                        data:result,
                        destroy: true,
                        columns: [
                            {data: 'id_transaccion'},
                            {data: 'fecha_transaccion'},
                            {data: 'id_usuario'},
                            {data: 'total_transaccion'},
                            {data: 'persona_id'},
                            {data:'id_transaccion',render:function (data,type,row) {
                                return '<button type="submit" class="fas fa-print" onclick="report('+data+','+row["tipo_transaccion"]+')"></button>';

                                }}


                        ]
                    });
                    console.log(data);
                }
            });

        });



    });


    function report(dat,tipo) {
        var tablaProducto = $('#table_producto').DataTable({
            "ajax": "http://localhost/licoreria/DetalleTransaccion/"+dat,
            "dataSrc": "",
            destroy: true,
            columns: [
                {data: 'id_producto'},
                {data: 'nombre_producto'},
                {data: 'cantidad_producto'},
                {data: 'nombre_unidad'},
                {data: 'subtotal'},
                {data: 'existencia_producto'}

            ]
        });

            $.ajax({
                url:"http://localhost/licoreria/Reporte/Pedidoinfo",
                data:{
                    "id_transaccion_report":dat,
                    "tipo_transaccion_report":tipo
                },
                type:"post",
                success:function (data) {

                    console.log(data);
                    var result = jQuery.parseJSON(data);
                    $("#tipo").empty();
                    $("#trans").empty();
                    $("#fecha").empty();
                    $("#persona").empty();
                    $("#fecha").append(result[0]["fecha_transaccion"]);
                    $("#trans").append(result[0]["id_transaccion"]);
                    $("#nombre_usuario").empty();
                    $("#correo_usuario").empty();
                    $("#telefono_usuario").empty();
                    $("#nombre_usuario").append(result[0]["nombre_usuario"]);
                    $("#correo_usuario").append(result[0]["id_usuario"]);
                    $("#telefono_usuario").append(result[0]["telefono_usuario"]);
                    $("#nombre_persona").empty();
                    $("#correo_persona").empty();
                    $("#telefono_persona").empty();

                    console.log(result[0]["tipo_transaccion"])
                    if(result[0]["tipo_transaccion"]==1){
                        $("#persona").append("Proveedor");

                        $("#nombre_persona").append(result[0]["nombre_proveedor"]);
                        $("#correo_persona").append(result[0]["correo_proveedor"]);
                        $("#telefono_persona").append(result[0]["telefono_proveedor"]);
                        $("#tipo").append("Entrada");
                    }else {
                        $("#nombre_persona").append(result[0]["nombre_cliente"]);
                        $("#correo_persona").append(result[0]["correo_proveedor"]);
                        $("#correo_persona").append(result[0]["telefono"]);
                        $("#persona").append("Proveedor");
                        $("#tipo").append("Salida");

                    }


                }
            });


    }

    $("#existencia").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url:"http://localhost/licoreria/Reporte/Existencia",
            data:$(this).serialize(),
            success:function (data) {
                console.log(data);
            }
        });

    });
</script>
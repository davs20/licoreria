

<?php
session_start();
?>

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" >
            <h1>Pedido</h1>
            <div class="row panel panel-container">

                <form action="" >
                    <div class="form-group">
                        <label for="">Usuario</label>
                        <input type="hidden" name="id_usuario_transaccion" value="<?php
                        echo $_SESSION["id_user"];
                        ?>">
                        <input type="text" disabled="" value="<?php
                        echo $_SESSION["user"];
                        ?>" class="form-control" name="usuario">
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de Pedido</label>
                        <select name="tipo_pedido"  required class="form-control">
                            <option value="" selected>Seleccione El tipo de pedido</option>
                            <option value="1">Entrada</option>
                            <option value="2">Salida</option>
                        </select>
                    </div>

                    <div id="persona_tipo">

                    </div>

                    <label for="">Detalle Productos</label>
                    <div >
                        <div class="form-group-sm" id="detalle_producto">


                    </div>

                        <div class="form-group">

                                <div class="col-sm-offset-9">
                                    <label for="">Total</label>
                                    <input type="number"  class="form-control" value="0" name="total" disabled>
                                </div>

                        </div>



                    </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="submit"  class="btn-success form-control" >Enviar</button>
                            </div>
                        </div>


                </form>

            </div>

        </div>

        <div class="col-sm-6 col-sm-offset-5 col-lg-10 col-lg-offset-2 main" >
            <div class="">
                <h1>Productos</h1>

                <div class="row panel panel-default">


                    <table id="table_id" class="display">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Existencia</th>
                            <th>Categoria</th>
                            <th>Opciones</th>

                        </tr>
                        </thead>

                    </table>


                </div>
            </div>



            <script type="text/javascript">
                $(document).ready(function () {
                    var tablaProducto = $('#table_id').DataTable({
                        "ajax": "http://localhost/licoreria/Productos",
                        "dataSrc": "",
                        destroy: true,
                        columns: [
                            {data: 'id_producto'},
                            {data: 'nombre_producto'},
                            {
                                data: 'img', render: function (data) {
                                    return '<img src="http://localhost/licoreria/' + data + '" alt="Smiley face" width="80" height="80">';

                                }
                            },
                            {data: 'existencia_producto'},

                            {data: 'nombre_categoria'},

                            {
                                data: 'id_producto', render: function (data, type,row) {
                                    if (row["estado_producto"]==1 && row["existencia_producto"]>0) return '<button type="button"   id="add-produc-'+data+'"  class="btn btn-primary" onclick="agregar(' + data + ')" ><i class="fas fa-plus-circle"></i></button>';
                                    return '<button type="button"  disabled=""   class="btn btn-primary" onclick="agregar(' + data + ')" ><i class="fas fa-plus-circle"></i></button>';
                                }
                            }

                        ]
                    });
                });

                $("[name='tipo_pedido']").on("change",function () {
                    console.log($(this).val());
                    $("#persona_tipo").empty();
                    if($(this).val()==1){
                       $("#persona_tipo").append(' <div class="form-group">\n' +
                           '                        <label for="">Proveedor</label>\n' +
                           '                        <select name="persona"  required class="form-control">\n' +
                           '                        </select>\n' +
                           '                    </div>');

                        $.ajax({
                            url: "http://localhost/licoreria/Proveedores",
                            success: function (data) {
                                var datos = jQuery.parseJSON(data);
                                $("[name='persona']").append("<option>Seleccione Proveedor</option>");
                                for (var i = 0; i < datos["data"].length; i++) {
                                    $("[name='persona']").append("<option value='" + datos["data"][i]["id_proveedor"] + "'>" + datos["data"][i]["nombre_proveedor"] + "</option>");

                                }


                            }

                        });
                    }else{

                        $("#persona_tipo").append(' <div class="form-group">\n' +
                            '                        <label for="">Cliente</label>\n' +
                            '                        <select name="persona"  required class="form-control">\n' +
                            '                        </select>\n' +
                            '                    </div>');

                        $.ajax({
                            url: "http://localhost/licoreria/Clientes",
                            success: function (data) {
                                var datos = jQuery.parseJSON(data);
                                $("[name='persona']").append("<option>Seleccione Cliente</option>");
                                for (var i = 0; i < datos["data"].length; i++) {
                                    $("[name='persona']").append("<option value='" + datos["data"][i]["id_cliente"] + "'>" + datos["data"][i]["nombre_cliente"] + "</option>");

                                }


                            }

                        });


                    }


                })




            </script>



            <script type="text/javascript">
                $("form").submit(function (event) {
                    event.preventDefault();
                    var myform = $('form');
                    // Find disabled inputs, and remove the "disabled" attribute
                    var disabled = myform.find(':input:disabled').removeAttr('disabled');

                    // serialize the form
                    var serialized = myform.serialize();
                    disabled.attr('disabled','disabled');
                    console.log(serialized);
                    $.ajax({
                        url:"http://localhost/licoreria/Pedido/Create",
                        data:serialized,
                        type:"POST",
                        success:function (data) {
                            swal({
                                title: "Transaccion Exitosa!",
                                text: "Pedido Guardado!",
                                icon: "success",
                            });

                        }
                    });

                });

                function agregar(id) {
                    var ida="#add-produc-"+id;
                    $(ida).attr("disabled","disabled");
                    $.ajax({
                       url:"http://localhost/licoreria/Producto/"+id,
                        success:function (data) {
                           var producto=jQuery.parseJSON(data);
                           if (producto["existencia_producto"]>0){
                               $("#detalle_producto").append('<div class="row " id="pro'+producto["id_producto"]+'" >\n' +
                                   '                                <div class="col-sm-1" >' +
                                   '<input type="hidden" class="existencia" value="'+producto["existencia_producto"]+'">\n' +
                                   '                                    <label for="">Eliminar</label>\n' +
                                   '                                    <button class="btn-danger form-control" name="eliminar[]" onclick="eliminar('+producto["id_producto"]+')" >X</button>\n' +
                                   '                                </div>\n' +
                                   '                                <div class="col-sm-2">\n' +
                                   '                                    <label for="">Nombre</label>\n' +
                                   '                                    <input type="text" disabled class="form-control" value="'+producto['nombre_producto']+'" name="nombre_producto[]">\n' +
                                   '                                </div>\n' +
                                   '                                <div class="col-sm-2">\n' +
                                   '                                    <label for="">Cantidad</label>\n' +
                                   '                                    <input type="number" class="form-control cantidad" value="1" min="1" onchange="cantidad('+producto['id_producto']+')" name="cantidad_producto[]">\n' +
                                   '                                </div>\n' +
                                   '                                <div class="col-sm-2">\n' +
                                   '                                    <label for="">Subtotal</label>\n' +
                                   '                                    <input type="number"  min="1" disabled step="any" class="form-control subtotal" value="'+producto["precio_producto"]+'" onchange="total('+producto["id_producto"]+')" name="subtotal_producto[]">\n' +
                                   '                                </div><input type="hidden" value="'+producto["id_producto"]+'" name="id_producto[]"><input type="hidden" value="'+producto["precio_producto"]+'" class="precio">\n' +
                                   '\n' +
                                   '                            </div>');

                           }else {

                               swal( "Error" ,  "Se ha llegado al limite de la existencia en estre producto!" ,  "error" );

                           }



                            $("[name='total']").val(0);

                            $(".subtotal").each(function () {
                                $("[name='total']").val(parseFloat($(this).val())+parseFloat($("[name='total']").val()));

                            });

                        }
                    });







                }
                function cantidad(id) {
                    var cant="#pro"+id+" .cantidad".toString();
                    var sub="#pro"+id+" .subtotal".toString();
                    var pre="#pro"+id+" .precio".toString();
                    var exis="#pro"+id+" .existencia".toString();
                    console.log($(cant).val());
                    if(parseInt($(cant).val())>parseInt($(exis).val())){
                        swal( "Error" ,  "Se ha llegado al limite de la existencia en este producto!" ,  "error" );
                        $(cant).val($(exis).val());
                    }else{
                        $(sub).val(($(pre).val()*$(cant).val()));
                        $("[name='total']").val(0);

                        $(".subtotal").each(function () {
                            $("[name='total']").val(parseFloat($(this).val())+parseFloat($("[name='total']").val()));

                        });

                    }






                }


                function eliminar(id) {
                    var ida="#add-produc-"+id;
                    var pre="#pro"+id+" .precio".toString();
                    var cant="#pro"+id+" .cantidad".toString();

                    $(ida).prop("disabled",false);
                    var dd="#pro"+id;
                    $(dd).remove();
                    $("[name='total']").val(0);

                    $(".subtotal").each(function () {
                        $("[name='total']").val(parseFloat($(this).val())+parseFloat($("[name='total']").val()));

                    });



                }
                
                function total(id) {
                    var sub="#pro"+id+" .cantidad".toString();
                    $("[name='total']").val($(sub).val())

                }





            </script>





        </div>







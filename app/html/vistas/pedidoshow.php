<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div id="row panel panel-default ">
        <h1>Pedidos</h1>
       
    </div>


    <div class="row panel panel-default">


        <table id="table_id" class="display">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tipo Transaccion</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Total Transaccion</th>
                <th>Opciones</th>


            </tr>
            </thead>

        </table>


    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        var tablaMarca = $('#table_id').DataTable({
            "ajax": "http://localhost/licoreria/PedidosShow",
            "dataSrc": "",
            destroy: true,
            columns: [
                {data: 'id_transaccion'},
                {data: 'tipo_transaccion',render:function (data) {
                    if (data==1){
                        return 'Entrada';
                    }
                    return 'Salida';
                        
                    }},
                {data: 'fecha_transaccion'},
                {data: 'nombre_usuario'},
                {data: 'total_transaccion'},
                {
                    data: 'id_transaccion', render: function (data, type,row) {
                         return '<button type="button"     class="btn btn-primary" onclick="edit(' + data + ')" ><i class="fas fa-edit"></i></button>';
                        //return '<button type="button"  disabled=""   class="btn btn-primary" onclick="agregar(' + data + ')" ><i class="fas fa-plus-circle"></i></button>';
                    }
                }

            ]
        });


        $("#edit").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url:"http://localhost/licoreria/PedidoShow/Update",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                type:"post",
                success:function () {
                    tablaPedidoShow.ajax.reload();
                }
            });
        });


        $("#create").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url:"http://localhost/licoreria/PedidoShow/Create",
                type:"post",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function () {
                    tablaPedidoShow.ajax.reload();
                }
            });
        });



    });

    function activate(id) {
        $.ajax({
            url:"http://localhost/licoreria/PedidoShow/Activate/" + id,
            data:id,
            success:function() {

            }
        });
    }
    function disable(id) {
        $.ajax({
            url:"http://localhost/licoreria/PedidoShow/Disable/" + id,
            data:id,
            success:function() {


            }
        });

    }


</script>
<div id="modal">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="edit" enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="hidden"  name="id" class="form-control"></div>
                        <div class="form-group"><label>Nombre</label>
                            <input type="text" name="nombre" class="form-control"></div>


                        <div class="form-group">
                            <label>Proveedor</label>
                            <select name="proveedor" class="form-control"></select></div>


                        <div class="form-group">
                            <label for="">Imagen</label>
                            <input type="file" name="img" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>


</div>


<script type="text/javascript">
    $(document).ready(function () {

        $.ajax({
            url: "http://localhost/licoreria/Proveedores",
            success: function (data) {
                var datos = jQuery.parseJSON(data);
                $("[name='proveedor']").append(" <option >Seleccione una Proveedor</option>");
                for (var i = 0; i < datos["data"].length; i++) {
                    $("[name='proveedor']").append("<option value='" + datos["data"][i]["id_proveedor"] + "'>" + datos["data"][i]["nombre_proveedor"] + "</option>");
                }
            }
        });
    });


</script>
<script type="text/javascript">

    function edit(id) {
        $.ajax({
            url: "http://localhost/licoreria/PedidoShow/" + id,
            data: id,
            success: function (data) {
                console.log(data);
                var PedidoShow = jQuery.parseJSON(data);
                $("#edit [name='nombre']").val(pedido["nombre_pedido"]);
                $("#edit [name='id']").val(pedido["id_pedido"]);
                $("#edit [name='proveedor']").val(pedido["proveedor_id"]);


            }


        });


    }



</script>
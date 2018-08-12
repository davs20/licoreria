<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div id="row panel panel-default ">
        <h1>Marcas</h1>
        <button class="btn-primary" data-toggle="modal" data-target="#crearModal">Agregar</button>
    </div>


    <div class="row panel panel-default">


        <table id="table_id" class="display">
            <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Tipo Transaccion</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Opciones</th>

            </tr>
            </thead>

        </table>


    </div>
</div>

<div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="crearModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Marca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="create">

                    <div class="form-group">
                        <input type="hidden"  name="id" class="form-control">
                    </div>
                    <div class="form-group"><label>Nombre</label>
                        <input type="text" name="nombre" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Proveedor</label>
                        <select name="proveedor" class="form-control">

                        </select></div>
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <input type="file" name="img" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" >Guardar</button>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        var tablaMarca = $('#table_id').DataTable({
            "ajax": "http://localhost/licoreria/Marcas",
            "dataSrc": "",
            destroy: true,
            columns: [
                {data: 'id_marca'},
                {data: 'nombre_marca'},
                {data: 'img',render: function (data) {
                        return '<img src="http://localhost/licoreria/'+data+'" alt="Smiley face" width="80" height="80">';

                    }},
                {data: 'nombre_proveedor'},
                {data: 'estado',render:function (data) {
                        if (data==1){
                            return "Activado";
                        }
                        return "Deactivado"
                    }},
                {
                    data: 'id_marca', render: function (data, type, row) {
                        if (row["estado"]==1){
                            return '<button type="button"   class="btn btn-primary" onclick="edit(' + data +')" data-toggle="modal" data-target="#exampleModal"><i class="far fa-edit"></i></button><button class="btn btn-danger" type="button"  onclick="disable('+data+')" ><i class="fas fa-ban"></i></button>';
                        }
                        return '<button type="button"   class="btn btn-primary" onclick="edit(' + data + ')" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-edit"></i></button><button class=" btn btn-success" type="button"  onclick="activate('+data+')" ><i class="fas fa-check"></i></button>';
                    }
                }

            ]
        });


        $("#edit").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url:"http://localhost/licoreria/Marca/Update",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                type:"post",
                success:function () {
                    tablaMarca.ajax.reload();
                }
            });
        });


        $("#create").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url:"http://localhost/licoreria/Marca/Create",
                type:"post",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function () {
                    tablaMarca.ajax.reload();
                }
            });
        });



    });

    function activate(id) {
        $.ajax({
            url:"http://localhost/licoreria/Marca/Activate/" + id,
            data:id,
            success:function() {

            }
        });
    }
    function disable(id) {
        $.ajax({
            url:"http://localhost/licoreria/Marca/Disable/" + id,
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal Marca</h5>
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
            url: "http://localhost/licoreria/Marca/" + id,
            data: id,
            success: function (data) {
                console.log(data);
                var marca = jQuery.parseJSON(data);
                $("#edit [name='nombre']").val(marca["nombre_marca"]);
                $("#edit [name='id']").val(marca["id_marca"]);
                $("#edit [name='proveedor']").val(marca["proveedor_id"]);


            }


        });


    }



</script>
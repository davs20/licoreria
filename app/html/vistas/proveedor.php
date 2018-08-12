<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div id="row panel panel-default ">
        <h1>Proveedores</h1>
        <button class="btn-primary" data-toggle="modal" data-target="#crearModal">Agregar</button>
    </div>


    <div class="row panel panel-default">


        <table id="table_id" class="display">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Correo</th>
                <th>Telefono</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Crear Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="create">

                    <div class="form-group">
                        <input type="hidden"  name="id" class="form-control">
                    </div>
                    <div class="form-group"><label>Nombre</label>
                        <input type="text" name="nombre_pro" class="form-control">
                    </div>
                    <div class="form-group"><label>Telefono</label>
                        <input type="text" name="telefono" class="form-control">
                    </div>
                    <div class="form-group"><label>Correo</label>
                        <input type="email" name="correo" class="form-control">
                    </div>
                    <div class="form-group"><label>Direccion</label>
                        <textarea name="direccion" id="" cols="30" rows="10"></textarea>
                    </div>


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
        var tablaProveedor = $('#table_id').DataTable({
            "ajax": "http://localhost/licoreria/Proveedores",
            "dataSrc": "",
            destroy: true,
            columns: [
                {data: 'id_proveedor'},
                {data: 'nombre_proveedor'},
                {data: 'img',render: function (data) {
                        return '<img src="http://localhost/licoreria/'+data+'" alt="Smiley face" width="80" height="80">';

                    }},
                {data: 'correo_proveedor'},
                {data: 'telefono_proveedor'},
                {data: 'estado',render:function (data) {
                        if (data==1){
                            return "Activado";
                        }
                        return "Deactivado"
                    }},
                {
                    data: 'id_proveedor', render: function (data, type, row) {
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
                url:"http://localhost/licoreria/Proveedor/Update",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                type:"post",
                success:function () {
                    tablaProveedor.ajax.reload();
                }
            });
        });


        $("#create").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url:"http://localhost/licoreria/Proveedor/Create",
                type:"post",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function () {

                }
            });
        });



    });

    function activate(id) {
        $.ajax({
            url:"http://localhost/licoreria/Proveedor/Activate/" + id,
            data:id,
            success:function() {

            }
        });
    }
    function disable(id) {
        $.ajax({
            url:"http://localhost/licoreria/Proveedor/Disable/" + id,
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="edit" enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="hidden"  name="id" class="form-control"></div>
                        <div class="form-group"><label>Nombre</label>
                            <input type="text" name="nombre_pro" class="form-control"></div>

                         <div class="form-group"><label>Telefono</label>
                            <input type="text" name="telefono" class="form-control"></div>
                        <div class="form-group"><label>Correo</label>
                            <input type="email" name="correo" class="form-control"></div>

                        <div class="form-group"><label>Direccion</label>
                            <textarea name="direccion" id="" class="form-control" cols="30" rows="10"></textarea>
                        </div>

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

    function edit(id) {
        $.ajax({
            url: "http://localhost/licoreria/Proveedor/" + id,
            data: id,
            success: function (data) {
                var proveedor = jQuery.parseJSON(data);
                console.log(proveedor["telefono_proveedor"]);

                $("#edit [name='nombre_pro']").val(proveedor["nombre_proveedor"]);
                $("#edit [name='id']").val(proveedor["id_proveedor"]);
                $("#edit [name='telefono]").val(proveedor["telefono_proveedor"]);
                $("#edit [name='correo']").val(proveedor["correo_proveedor"]);
                $("#edit [name='direccion']").val(proveedor["direccion_proveedor"]);




            }


        });


    }



</script>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div id="row panel panel-default ">
        <h1>Usuarios</h1>
        <button class="btn-primary" data-toggle="modal" data-target="#crearModal">Agregar</button>
    </div>


    <div class="row panel panel-default">


        <table id="table_id" class="display">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Apellido</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="create">

                    <div class="form-group">
                        <input type="hidden"  name="id_usuario" class="form-control">
                    </div>
                    <div class="form-group"><label>Nombre</label>
                        <input type="text" name="nombre" class="form-control">
                    </div>

                    <div class="form-group"><label>Apellido</label>
                        <input type="text" name="apellido" class="form-control">
                    </div>
                    <div class="form-group"><label>Telefono</label>
                        <input type="text" name="telefono" class="form-control">
                    </div>
                    <div class="form-group"><label>Correo</label>
                        <input type="text" name="correo" class="form-control">
                    </div>
                    <div class="form-group"><label>Telefono</label>
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
        var tablaMarca = $('#table_id').DataTable({
            "ajax": "http://localhost/licoreria/Usuarios",
            "dataSrc": "",
            destroy: true,
            columns: [
                {data: 'id_usuario'},
                {data: 'nombre_usuario'},
                {
                    data: 'img_usuario', render: function (data) {
                        return '<img src="http://localhost/licoreria/' + data + '" alt="Smiley face" width="80" height="80">';

                    }
                },
                {data: 'apellido_usuario'},
                {
                    data: 'estado_usuario', render: function (data) {
                        if (data == 1) {
                            return "Activado";
                        }
                        return "Deactivado"
                    }
                },
                {
                    data: 'id_usuario', render: function (data, type, row) {
                        if (row["estado"] == 1) {
                            return '<button type="button"   class="btn btn-primary" onclick="edit(' + data.toString() + ')" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i></button><button class="btn btn-danger" type="button"  onclick="disable(' + data.toString() + ')" ><i class="fas fa-ban"></i></button>';
                        }
                        return '<button type="button"   class="btn btn-primary" onclick="edit(' + data.toString() + ')" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button><button class=" btn btn-success" type="button"  onclick="activate(' + data.toString() + ')" ><i class="fas fa-check"></i></button>';
                    }
                }

            ]
        });


        $("#edit").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "http://localhost/licoreria/Marca/Update",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                type: "post",
                success: function () {
                    tablaMarca.ajax.reload();
                }
            });
        });


        $("#create").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "http://localhost/licoreria/Marca/Create",
                type: "post",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function () {
                    tablaMarca.ajax.reload();
                }
            });
        });


    });


    // function edit(id) {
    //     console.log("hola");
    //     $.ajax({
    //         url: "http://localhost/licoreria/Usuario/" + id,
    //         data: id,
    //         success: function (data) {
    //             var usuario = jQuery.parseJSON(data);
    //             console.log(usuario["telefono_usuario"]);
    //
    //             $("#edit [name='nombre']").val(usuario["nombre_usuario"]);
    //             $("#edit [name='id_cliente']").val(usuario["id_usuario"]);
    //             $("#edit [name='apellido']").val(usuario["apellido_usuario"]);
    //             $("#edit [name='telefono']").val(usuario["telefono_usuario"]);
    //             $("#edit [name='correo']").val(usuario["correo_usuario"]);
    //             $("#edit [name='direccion']").val(usuario["direccion_usuario"]);
    //
    //
    //
    //
    //         }
    //
    //
    //     });
    //
    //
    // }



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
<!--<div id="modal">-->
<!--    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal"-->
<!--         aria-hidden="true">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="exampleModalLabel">Modal Cliente</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true"></span></button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <form method="post" enctype="multipart/form-data" id="edit">-->
<!---->
<!--                        <div class="form-group">-->
<!--                            <input type="hidden"  name="id_usuario" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="form-group"><label>Nombre</label>-->
<!--                            <input type="text" name="nombre" class="form-control">-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group"><label>Apellido</label>-->
<!--                            <input type="text" name="apellido" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="form-group"><label>Telefono</label>-->
<!--                            <input type="text" name="telefono" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="form-group"><label>Correo</label>-->
<!--                            <input type="text" name="correo" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="form-group"><label>Telefono</label>-->
<!--                            <textarea name="direccion" id="" cols="30" rows="10"></textarea>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group">-->
<!--                            <label for="">Imagen</label>-->
<!--                            <input type="file" name="img" class="form-control">-->
<!--                        </div>-->
<!--                        <div class="modal-footer">-->
<!--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>-->
<!--                            <button type="submit" class="btn btn-primary" >Guardar</button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!---->
<!---->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
<!---->
<!---->
<!--</div>-->



<script type="text/javascript">




</script>
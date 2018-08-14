<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div id="row panel panel-default ">
        <h1>Unidades</h1>
        <button class="btn-primary" data-toggle="modal" data-target="#crearModal">Agregar</button>
    </div>


    <div class="row panel panel-default">


        <table id="table_categoria" class="display">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Crear categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="create">

                    <div class="form-group">
                        <input type="hidden"  name="id_cat" class="form-control">
                    </div>
                    <div class="form-group"><label>Nombre</label>
                        <input type="text" name="nombre_cat" class="form-control">
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
        var tabla = $('#table_categoria').DataTable({
            "ajax": "http://localhost/licoreria/Unidades",
            "dataSrc": "",
            destroy: true,
            columns: [
                {data: 'id_unidad'},
                {data: 'nombre_unidad'},
                {data: 'estado',render:function (data) {
                        if (data==1){
                            return "Activado";
                        }
                        return "Deactivado"
                    }},
                {
                    data: 'id_unidad', render: function (data, type, row) {
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
                url:"http://localhost/licoreria/Unidad/Update",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                type:"post",
                success:function () {
                    tabla.ajax.reload();
                }
            });
        });


        $("#create").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url:"http://localhost/licoreria/Unidad/Create",
                type:"post",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function () {
                    tabla.ajax.reload();
                }
            });
        });



    });

    function activate(id) {
        $.ajax({
            url:"http://localhost/licoreria/Unidad/Activate/" + id,
            data:id,
            success:function() {

            }
        });
    }
    function disable(id) {
        $.ajax({
            url:"http://localhost/licoreria/Unidad/Disable/" + id,
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal Unidad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="edit" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden"  name="id_cat" class="form-control"></div>
                        <div class="form-group"><label>Nombre</label>
                            <input type="text" name="nombre_cat" class="form-control"></div>
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
            url: "http://localhost/licoreria/Unidad/" + id,
            data: id,
            success: function (data) {
                console.log(data);
                var unidad = jQuery.parseJSON(data);
                $("#edit [name='nombre_cat']").val(unidad["nombre_unidad"]);
                $("#edit [name='id_cat']").val(unidad["id_unidad"]);



            }


        });


    }


</script>

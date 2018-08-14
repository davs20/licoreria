<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div id="row panel panel-default ">
        <h1>Productos</h1>
        <button class="btn-primary" data-toggle="modal" data-target="#crearModal">Agregar</button>
    </div>


    <div class="row panel panel-default">


        <table id="table_id" class="display">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Existencia</th>
                <th>Categoria</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Modal Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="create">

                    <div class="form-group">
                        <input type="hidden"  name="id" class="form-control"></div>
                    <div class="form-group"><label>Nombre</label>
                        <input type="text" name="nombre_p" class="form-control"></div>
                    <div class="form-group">
                        <label>Marca</label>
                        <select class="form-control"  name="marca">


                        </select>
                    </div>
                    <div class="form-group"><label>Existencia</label>
                        <input type="number" class="form-control" name="existencia">
                    </div>
                    <div class="form-group"><label>Categoria</label>
                        <select name="categoria" class="form-control" selected="">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Proveedor</label>
                        <select name="proveedor" class="form-control">

                        </select></div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea class="form-control" name="descripcion"></textarea>
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
        var tablaProducto = $('#table_id').DataTable({
            "ajax": "http://localhost/licoreria/Productos",
            "dataSrc": "",
            destroy: true,
            columns: [
                {data: 'id_producto'},
                {data: 'nombre_producto'},
                {data: 'img',render: function (data) {
                    return '<img src="http://localhost/licoreria/'+data+'" alt="Smiley face" width="80" height="80">';

                    }},
                {data: 'existencia_producto'},
                {data: 'nombre_categoria'},
                {data: 'estado_producto',render:function (data) {

                        if (data==1){
                            return "Activado";
                        }
                            return "Deactivado";

                    }},
                {
                    data: 'id_producto', render: function (data, type, row) {
                         console.log(row["estado_producto"])
                        if (row["estado_producto"]==1){
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
                url:"http://localhost/licoreria/Producto/Update",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                type:"post",
                success:function () {
                    tablaProducto.ajax.reload();
                }
            });
        });


        $("#create").submit(function (event) {
            event.preventDefault();
            $.ajax({
                url:"http://localhost/licoreria/Producto/Create",
                type:"post",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success:function () {
                    tablaProducto.ajax.reload();
                }
            });
        });



    });

    function activate(id) {
        $.ajax({
            url:"http://localhost/licoreria/Producto/Activate/" + id,
            data:id,
            success:function() {

            }
        });
    }
    function disable(id) {
        $.ajax({
            url:"http://localhost/licoreria/Producto/Disable/" + id,
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="edit" enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="hidden"  name="id" class="form-control"></div>
                        <div class="form-group"><label>Nombre</label>
                            <input type="text" name="nombre_p" class="form-control"></div>
                        <div class="form-group">
                            <label>Marca</label>
                            <select class="form-control"  name="marca">


                            </select>
                        </div>
                        <div class="form-group"><label>Existencia</label>
                            <input type="number" class="form-control" name="existencia">
                        </div>
                        <div class="form-group"><label>Categoria</label>
                            <select name="categoria" class="form-control" selected="">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Proveedor</label>
                            <select name="proveedor" class="form-control">

                            </select></div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea class="form-control" name="descripcion"></textarea>
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
    $(document).ready(function () {
        $.ajax({
            url: "http://localhost/licoreria/Categorias",
            success: function (data) {
                var datos = jQuery.parseJSON(data);
                //console.log(datos["data"][0]["id_categoria"]);
                $("[name='categoria']").append("<option>Seleccione Categoria</option>");
                for (var i = 0; i < datos["data"].length; i++) {
                    $("[name='categoria']").append("<option value='" + datos["data"][i]["id_categoria"] + "'>" + datos["data"][i]["nombre_categoria"] + "</option>");
                    //console.log( datos["data"].length);
                }


            }

        });

        $.ajax({
            url: "http://localhost/licoreria/Unidades",
            success: function (data) {
                var datos = jQuery.parseJSON(data);
                //console.log(datos["data"][0]["id_categoria"]);
                $("[name='categoria']").append("<option>Seleccione Unidad</option>");
                for (var i = 0; i < datos["data"].length; i++) {
                    $("[name='unidad']").append("<option value='" + datos["data"][i]["id_unidad"] + "'>" + datos["data"][i]["nombre_unidad"] + "</option>");
                    //console.log( datos["data"].length);
                }


            }

        });

        $.ajax({
            url: "http://localhost/licoreria/Marcas",
            success: function (data) {
                var datos = jQuery.parseJSON(data);
                $("[name='marca']").append(" <option >Seleccione una Marca</option>");
                for (var i = 0; i < datos["data"].length; i++) {
                    $("[name='marca']").append("<option value='" + datos["data"][i]["id_marca"] + "'>" + datos["data"][i]["nombre_marca"] + "</option>");
                }
            }
        });
        //
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
            url: "http://localhost/licoreria/Producto/" + id,
            data: id,
            success: function (data) {
                console.log(data);
                var producto = jQuery.parseJSON(data);
                $("[name='nombre_p']").val(producto["nombre_producto"]);
                $("[name='existencia']").val(producto["existencia_producto"]);
                $("[name='id']").val(producto["id_producto"]);
                $("[name='descripcion']").val(producto["descripcion_producto"]);
                $("[name='marca']").val(producto["marca_id"]);
                $("[name='proveedor']").val(producto["proveedor_id"]);
                $("[name='categoria']").val(producto["categoria_id"]);




            }


        });


    }



</script>


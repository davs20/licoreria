
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
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Fecha</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo Pedido</label>
                                        <select name="tipo_pedido" id="">
                                            <option value="1">Entrada</option>
                                            <option value="2">Salida</option>
                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <button class="btn-success form-control">Enviar </button>
                                    </div
                                </form>

                            </div>
                            <div class="col-md-6">
                                <h4>Existencia Producto</h4>
                                <form action="">
                                    <div class="form-group">
                                        <label for="">Fecha</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Producto</label>
                                        <select name="producto" id="">

                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <button class="btn-success form-control">Enviar </button>
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
                    Grafico
                    <ul class="pull-right panel-settings panel-button-tab-right">
                        <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                                <em class="fa fa-cogs"></em>
                            </a>
                        </li>
                    </ul>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
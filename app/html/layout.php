 <?php 
$dir="http://localhost/licoreria";
 
 ?>


 <div id="left-nav">
       <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
           <div class="profile-sidebar">
               <div class="profile-userpic">
                   <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
               </div>
               <div class="profile-usertitle">
                   <div class="profile-usertitle-name"><?php  echo $_SESSION["user"]; ?></div>
                   <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
               </div>
               <div class="clear"></div>
           </div>
           <div class="divider"></div>


           <ul class="nav menu">
               <li class="active"><a href=""><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
               <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                       <em class="fa fa-navicon">&nbsp;</em> Pedidos <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                   </a>
                   <ul class="children collapse" id="sub-item-2">
                       <li><a class="" href="<?php echo $dir.'/Pedidos' ?>">
                               <span class="fa fa-arrow-right">&nbsp;</span> Ver Pedidos
                           </a></li>
                       <li><a class="" href="<?php echo $dir.'/Entradas' ?>">
                               <span class="fa fa-arrow-right">&nbsp;</span> Entrada
                           </a></li>
                       <li><a class="" href="<?php echo $dir.'/Salidas' ?>">
                               <span class="fa fa-arrow-right">&nbsp;</span> Salida
                           </a></li>
                       <li><a class="" href="<?php echo $dir.'/Reporte' ?>">
                               <span class="fa fa-arrow-right">&nbsp;</span> Reporte
                           </a></li>
                   </ul>
               </li>
               <li><a href="<?php echo $dir.'/Empleados' ?>"><em class="fas fa-people-carry">&nbsp;</em> Empleados</a></li>
               <li><a href="<?php echo $dir.'/Usuarios' ?>"><i class="fas fa-users"></i>Usuarios</a></li>
               <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                       <em class="fa fa-navicon">&nbsp;</em> Configuracion <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                   </a>
                   <ul class="children collapse" id="sub-item-1">
                       <li><a class="" href="<?php echo $dir.'/Productos' ?>">
                               <span class="fa fa-arrow-right">&nbsp;</span> Productos
                           </a></li>
                       <li><a class="" href="<?php echo $dir.'/Categorias' ?>">
                               <span class="fa fa-arrow-right">&nbsp;</span> Categorias
                           </a></li>
                       <li><a class="" href="<?php echo $dir.'/Proveedores' ?>">
                               <span class="fa fa-arrow-right">&nbsp;</span> Proveedores
                           </a></li>
                       <li><a class="" href="<?php echo $dir.'/Marcas' ?>">
                               <span class="fa fa-arrow-right">&nbsp;</span> Marca
                           </a></li>
                   </ul>
               </li>
               <li><a href="<?php echo $dir.'/login' ?>"><em class="fa fa-power-off">&nbsp;</em>Salir</a></li>
           </ul>
       </div>
       </div>


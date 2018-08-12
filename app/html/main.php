<?php 
 session_start();
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <title>Lumino - Dashboard</title>
    <link href="http://localhost/licoreria/app/html/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/licoreria/app/html/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://localhost/licoreria/app/html/css/datepicker3.css" rel="stylesheet">
    <link href="http://localhost/licoreria/app/html/css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<?php

include "header.php";

echo '<div class="container-fluid">
<div class="row">
<div class="col-md-2">';

include "layout.php";
 echo '</div>';
echo '<div id="case" class="col-md-12">';

include "vistas/".$_POST['vista'].".php";
echo "</div>
</div></div>";


?>




<script src="http://localhost/licoreria/app/html/js/case.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="http://localhost/licoreria/app/html/js/bootstrap.min.js"></script>
<script src="http://localhost/licoreria/app/html/js/chart.min.js"></script>
<script src="http://localhost/licoreria/app/html/js/chart-data.js"></script>
<script src="http://localhost/licoreria/app/html/js/easypiechart.js"></script>
<script src="http://localhost/licoreria/app/html/js/easypiechart-data.js"></script>
<script src="http://localhost/licoreria/app/html/js/bootstrap-datepicker.js"></script>
<script src="http://localhost/licoreria/app/html/js/custom.js"></script>



</body>
</html>
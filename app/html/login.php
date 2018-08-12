<?php 
 session_start();
 
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
    <link href="http://localhost/licoreria/app/html/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/licoreria/app/html/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://localhost/licoreria/app/html/css/datepicker3.css" rel="stylesheet">
    <link href="http://localhost/licoreria/app/html/css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>

</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post" action="">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="usuario" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pass" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
                            <button type="submit" class="btn btn-primary">Login</button>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


    <script src="http://localhost/licoreria/app/html/js/jquery-1.11.1.min.js"></script>
    <script src="http://localhost/licoreria/app/html/js/bootstrap.min.js"></script>
    <script>
        $("form").submit(function (event) {
            event.preventDefault();

            var data=$(this).serialize();
            $.ajax({
                url:'http://localhost/licoreria/login',
                data:data,
                type:'post',
                success:function (data) {
                    if(data==1){
                    	location.href ="http://localhost/licoreria/inicio";
                    }else{
                    	alert("Contrasena o Usuario Incorrectos Intente de Nuevo");
                    }
                }
            })
        })
    </script>
</body>
</html>

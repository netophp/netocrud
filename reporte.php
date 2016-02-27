<?php
include("vars/conexion.php");
$op=$_POST["op"];

	function guarda($a,$localhost,$user,$passwd,$bd){
//obtener las respuestas de la tabla cuestionario de cada pregunta
        $connection = mysql_connect($localhost,$user,$passwd) or die ("Unable to connect!");
       	$query = "$a";
       	$result = mysql_db_query($bd, $query, $connection) or die ("Error in query: $query. " . mysql_error());
       	//list($a) = mysql_fetch_row($result);
		mysql_close($connection);
		//echo "$query $a <br>";
		return $a;
}


if ($op==1){
	$nombre=$_POST["nombre"];
	$sustancia=$_POST["sustancia"];
	$presentacion=$_POST["presentacion"];
	$existencias=$_POST["existencias"];
	$a="insert into medicamentos (nombre,sustancia,presentacion,existencias) values ('$nombre','$sustancia','$presentacion','$existencias');";
	guarda($a,$serber,$user1,$passwd1,$bd);
	}
	else if ($op==2){
	$name1=$_POST["name2"];
	$nombre=$_POST["nombre"];
	$sustancia=$_POST["sustancia"];
	$presentacion=$_POST["presentacion"];
	$existencias=$_POST["existencias"];
	$a="update medicamentos set nombre='$nombre', sustancia='$sustancia',presentacion='$presentacion',existencias='$existencias' where nombre like '$name1'";
	guarda($a,$serber,$user1,$passwd1,$bd);
	
	}
	else if ($op==3){
    $name1=$_POST["name1"];
	$a="delete from medicamentos where nombre like '$name1'";
	guarda($a,$serber,$user1,$passwd1,$bd);
	
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Farmacia MIS16</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Pharmacy</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll active">
                        <a href="malta.php">Agregar</a>
                    </li>
                    <li class="page-scroll">
                        <a href="mmedi.php">Modificar</a>
                    </li>
                    <li class="page-scroll">
                        <a href="meliminar.php">Eliminar</a>
                    </li>
                    <li class="page-scroll">
                        <a href="reporte.php">Reporte</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<br>

    

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Lista de Medicamentos existentes</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-offset-2">

<?php 


	$conn = conectar_bd();
	if (!$conn)
	{
		echo 'No se puede conectar a la base de datos, intente m&aacute;s tarde';		
		echo '<p>&nbsp;</p>';		
	}	
				
		$result1 = mysql_query("select * from medicamentos",$conn);
	
		if (!$result1)
		{
			echo '<p>&nbsp;</p><p>&nbsp;</p>';
			echo '<h2>No se pudo mostrar resultado</h2>';	
			
		}
		else
		{
	
			echo "
<table class='table table-hover'>
    <thead>
      <tr>
        <th>No.</th>
        <th>Nombre</th>
        <th>Sustancia</th>
        <th>Presentaci&oacute;n</th>
        <th>Existencias</th>        
      </tr>
    </thead>
    <tbody>";
			
			$i=1;
			while($row=mysql_fetch_row($result1))
			{
				
				
				echo"
      <tr>
        <td>$i</td>
        <td>$row[1]</td>
        <td>$row[2]</td>
        <td>$row[3]</td>
        <td>$row[4]</td>		
      </tr>";
				$i++;
			}
			
			//echo '<meta http-equiv="refresh" content="2;url=altas_alumno.php">';
			echo"    
			</tbody>
  </table>";
			// se envian los valores
	
			
		}
		  
	mysql_close($conn);	

?>                  
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        Derechos Reservados 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
         

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>

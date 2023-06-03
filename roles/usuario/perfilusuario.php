<?php
include_once 'conexionPDO.php';
session_start();
if(!isset($_SESSION['rol']) && !isset($_SESSION['idusuario']))
{
	header('location: usuariophp.php');
}
else
{
	if($_SESSION['rol'] != 3)
	{
		header('location: usuariophp.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="perfilusuario.css">
	<title></title>
</head>
<body>
	 <header class="header">
    <div class="menu">
      <nav>
          <ul>
            <a href="roles/proyecto_formativo.html"><img class="logo" src="imagenes/logo2.png"></a>  
            <li><a></a></li>
            <li><a></a></li>
            <li><a></a></li>
            <li><a href="usuariophp.php">Atras</a></li>
            <li><a href="../proyecto_formativo.php">Inicio</a></li>
            <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
             <li><a></a></li>
              <li><a></a></li>
            <li></li>
            <li>
                  <form action="../inicio_sesion.php" method="POST">
                        <font> 
                              <b><input class="button2" type="submit" name="cerrar_sesion" value="CERRAR SESION"></b>
                        </font>
                  </form>
<!--                   <a href="inicio_sesion.php">Cerrar sesion</a></li> -->
            </li>
          </ul>
      </nav>
    </div>
  </header>

	<center>
	<?php
			$usuario = $_SESSION['nomusuario'];
			$password = $_SESSION['clave'];
			$fotosesion = $_SESSION['foto'];
			$idusuario = $_SESSION['idusuario'];
			

			echo "<font face= impact size= 6> Bienvenid@ <br>usuari@  <br>".$usuario."</font><br>";
			// echo $fotosesion;
	?>
	</center>
	</div>

	<br>
<div class="imagenes">
		<td>
			<?php
			echo "<img src='imagenes/$fotosesion ?>'";	
			?>
		</td>
</div>


		<div class="menu1">
		    <section class="form-register">
			        <h2>Perfil</h2><br><br>
				<form method="POST" enctype="multipart/form-data">

					NOMBRE <input type="text" class="controls" name="usuario" value="<?php echo $usuario ?>"><br>
					CLAVE  <input type="text" class="controls" name="password" value="<?php echo $password ?>"  ><br>
					FOTO 	 <input type="file" class="controls" name="fotosesion"  value="<?php echo $fotosesion ?>"><br>

					 			 <input type="text" class="controls" name="fotosesion"  ><br>

					<input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">

			    <input type="submit"   class="controls" name="update" value="Actualizar"><br>
        </select>
				</form>
			</section>
</body>
</html>

<?php

	 

$connection = mysqli_connect('localhost','root','','roladmin') or die ('problems en la conexion');


if(isset($_POST['update']))
	{

			
	$actualizausuario = $_POST['usuario'];
	$actualizaclave   = $_POST['password'];
	$actualizafoto = $_POST['fotosesion'];
	$idsusuario = $_POST['idusuario'];

	$ruta = "imagenes/".basename( $_FILES['fotosesion']['name']);
		if (move_uploaded_file( $_FILES['fotosesion']['tmp_name'],$ruta)) 
			{
			echo "El archivo ".basename( $_FILES['fotosesion']['name'])." ha sido subido satisfactoriamente";

			}
		else
			{
				echo "el archivo no se cargo";
			}	


	$update = "UPDATE usuarios SET nomusuario = '$actualizausuario',clave = ('$actualizaclave'),foto ='$actualizafoto' WHERE id = '$idusuario'";
	//$update = "UPDATE usuarios SET nomusuario = '".$actualizausuario."', clave = '".$actualizaclave."' WHERE id = ".$idusuario;



		$query_run = mysqli_query($connection,$update);

		if($query_run)
		{
			echo '<script>
			 				alert("data update")
			 			</script>';
		}
		else
		{
			echo '<script>
			 				alert(" no no no no")
			 			</script>';
		}
	}
?>	
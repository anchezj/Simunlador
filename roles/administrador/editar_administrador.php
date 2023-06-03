	<?php
include_once 'conexionPDO.php';
session_start();
if(!isset($_SESSION['rol']))
	{
		header('location: perfil.php');
	}
else
	{
		if($_SESSION['rol'] !=1)
			{
				header('location: perfil.php');
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="editar_administrador.css">
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
            <li><a href="perfil.php">Atras</a></li>
            <li><a href="../proyecto_formativo.php">Inicio</a></li>
            <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
            <li><a href="perfil.php">Perfil</a></li>
            <li><a></a></li>
            <li><a></a></li>
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


	<?php
		$conexion=mysqli_connect('localhost','root','','roladmin') or die ('problems en la conexion');
	?>

<?php
if(isset($_GET['editar']))
	{
	$editar_id = $_GET['editar'];
	$consulta = "SELECT * FROM usuarios WHERE id = '$editar_id'";
	$ejecutar=mysqli_query($conexion,$consulta);
	$filas=mysqli_fetch_array($ejecutar);
		$id =       $filas['id'];
		$usuario =  $filas['nomusuario'];
		$password = $filas['clave'];
		$idrol =    $filas['idrol'];
		$fotoeditor =    $filas['foto'];		
?>
		<div class="imagenes">
<?php
				echo "<img src='imagenes/$fotoeditor ?>'";	
			?>
		</div>
		<div class="menu1">
		    <section class="form-register" >
			        <h2>Perfil</h2><br><br>
				<form method="POST" action="#" enctype="multipart/form-data">
					NOMBRE <input type="text"     class="controls" name="usuario" value="<?php echo $usuario  ?>"> <br>
					CLAVE  <input type="password" class="controls" name="clave"   value="<?php echo $password ?>"><br>
								 <input type="file" 	class="controls"  name="foto" ><br>
					FOTO   <input type="text"    class="controls" name="foto"    value="<?php echo $fotoeditor ?>"><br>
			  					 
				<select class="controls" name="idrol" value="<?php echo $idrol    ?>">
        <option value="1">Administrador</option>
        <option value="2">Empleado</option>
        <option value="3">Usuario</option>
        </select>
					<input type="submit"   class="controls"  name="actualizame" value="Actualizar Datos" style="cursor: pointer;"><br>
				</form>
			</section>
		</div>

<?php
  }
?>
<?php
if(isset($_POST['actualizame']))
	{
	$actualizausuario = $_POST['usuario'];
	$actualizaclave   = $_POST['clave'];
	$actualizaidrol   = $_POST['idrol'];
	$actualizafoto   = $_POST['foto'];

	$ruta = "imagenes/".basename( $_FILES['foto']['name']);
		if (move_uploaded_file( $_FILES['foto']['tmp_name'],$ruta)) 
			{
			echo "<div align='center'><font face='impact' size='3'><b> 
			El archivo ".basename( $_FILES['foto']['name'])." ha sido subido satisfactoriamente</b></font></div>";
			}
		else
			{
				echo "el archivo no se cargo";
			}	


	$update = "UPDATE usuarios SET nomusuario = '$actualizausuario',clave = ('$actualizaclave'),idrol = '$actualizaidrol',foto ='$actualizafoto'  WHERE id = '$editar_id'";
	$ejecutar=mysqli_query($conexion,$update);
	if ($ejecutar)
		{
			header("Location: perfil.php");
			// echo "<script>
			// 		windows.open('editar_administrador.php?')
			// 	 </script> ";
		}
	else
		{
			echo "<script>
								alert ('no se pudo EDITAR')
							 </script> ";
		}
	}
	//unset($_POST['actualizame']);
?>
<?php
if(isset($_GET['borrar']))
	{
	$borrar_id = $_GET['borrar'];
	$borrar = "DELETE FROM usuarios WHERE id = '$borrar_id'";
	$ejecutar=mysqli_query($conexion,$borrar);
	if($ejecutar)
		{
			header("Location: perfil");
		}
    }
    	// unset($_POST['borrar']);
?>
</body>
</html>
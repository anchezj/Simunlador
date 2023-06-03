<?php
include_once 'conexionPDO.php';
session_start();
if(!isset($_SESSION['rol']))
	{
		header('location: administradorphp.php');
	}
else
	{
		if($_SESSION['rol'] !=1)
			{
				header('location: administradorphp');
			}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="perfil.css">
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
            <li><a href="administradorphp.php">Atras</a></li>
            <li><a href="../proyecto_formativo.php">Inicio</a></li>
            <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
           <!--  <li><a href="servicios.html">Servicios</a></li> -->
            <!-- <li><a href="#">Blog</a></li> -->
            <li></li>
            <li></li>
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
	<br>
	<center>
		<div class="titulo">
	
	<?php
			$usuario = $_SESSION['nomusuario'];
			$fotosesion = $_SESSION['foto'];

			
			echo "<font face= impact size= 6> Bienvenid@ <br>Administrador  <br>".$usuario."</font><br>";
			// echo $fotosesion;
	?>
	<?php
		$conexion=mysqli_connect('localhost','root','','roladmin') or die ('problems en la conexion');
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



</div >
<table>
	<div class="menu1">
		    <section class="form-register">
			        <h2>Ingresar usuario</h2><br><br>
				<form method="POST" action="#">
					NOMBRE <input type="text"     class="controls" name="usuario" required="" placeholder="Ingrese Nombre" pattern="[a-z]{4,8}"><br>
					CLAVE  <input type="password" class="controls" name="clave"   required="" placeholder="Ingrese Contraseña"><br>
				<select type="number"   class="controls"  name="idrol"   value="<?php echo $idrol    ?>"><br>>
        <option value="1">Administrador</option>
        <option value="2">Empleado</option>
        <option value="3">Usuario</option>

					ENVIAR <input type="submit"   class="controls" name="insertar" value="Insertar Datos">
				</form>
			</section>
	</div>
		<?php

		if(isset($_POST['insertar']))
			{
			$usuario = $_POST['usuario'];
			$clave   = $_POST['clave'];
			$idrol   = $_POST['idrol'];

			$insertar = "INSERT INTO usuarios(nomusuario,clave,idrol) VALUES ('$usuario','$clave','$idrol')";
			$ejecutar=mysqli_query($conexion,$insertar);
			if ($ejecutar)
				{
					header("Location: perfil.php?");
				}
			
			}
				// unset($_POST['insertar']);
		?>
		</td>

	</tr>
</table>
<table >
	<thead>
	<tr>	
			<th>ID</th>
			<th>NOMBRE</th>
			<th>PASSWORD</th>
			<th>IDROL</th>
	 		<th>FOTO</th>
			<th>EDITAR</th>
			<th>BORRAR</th>
	</tr>
</thead>
	<?php
$observar = "SELECT * FROM usuarios";
$ejecutar=mysqli_query($conexion,$observar);
	$contador = 0;
	while ($filas=mysqli_fetch_array($ejecutar)) 
	{
		$id =       $filas['id'];
		$usuario =  $filas['nomusuario'];
		$password = $filas['clave'];
		$idrol =    $filas['idrol'];
		$fotografia=$filas['foto'];
		$contador++;
	?>
	<tr>	
			<td><?php echo $id ?></td>
			<td><?php echo $usuario ?></td>
			<td><?php echo $password ?></td>
			<td><?php echo $idrol ?></td>
			<td><img src="imagenes/<?php echo $fotografia ?>" width="50" height="40" ></td>
			<td ><button class="button3"><a href="editar_administrador.php? editar= <?php echo $id; ?>">Editar</a></button></td>
			<td ><button class="button3"><a  href="perfil.php? borrar= <?php echo $id; ?>"  >Borrar</a></button></td>
	</tr>
	<?php
	}
	?>
</table>
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
		<div class="menu1">
		    <section class="form-register">
			        <h2>Perfil</h2><br><br>
				<form method="POST" action="#" enctype="multipart/form-data">
					NOMBRE <input type="text"     class="controls" name="usuario" value="<?php echo $usuario  ?>"> <br>
					CLAVE  <input type="password" class="controls" name="clave"   value="<?php echo $password ?>"><br>
					IDROL  <input type="number"   class="controls"  name="idrol"   value="<?php echo $idrol    ?>"><br>
					FOTO   <input type="text"     name="foto"    value="<?php echo $fotoeditor ?>"><br>
			   <input type="file" 	  name="imagenasubir" ><br>
			    <input type="submit"   class="controls" name="actualizame" value="Actualizar Datos" style="cursor: pointer;"><br>
        </select>

					<!-- <input type="submit"     name="actualizame" value="Actualizar Datos" style="cursor: pointer;"><br> -->
				</form>
			</section>
			<?php
				echo "<div align='center'><img src='imagenes/$fotoeditor ?>' width='200' height='160' ></div>";	
			?>
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

	$ruta = "imagenes/".basename( $_FILES['imagenasubir']['name']);
		if (move_uploaded_file( $_FILES['imagenasubir']['tmp_name'],$ruta)) 
			{
			echo "<div align='center'><font face='impact' size='3'><b> 
			El archivo ".basename( $_FILES['imagenasubir']['name'])." ha sido subido satisfactoriamente</b></font></div>";
			}
		else
			{
				echo "el archivo no se cargo";
			}

	$update = "UPDATE usuarios SET nomusuario = '$actualizausuario',clave = ('$actualizaclave'),idrol = '$actualizaidrol',foto ='$actualizafoto'  WHERE id = '$editar_id'";
	$ejecutar=mysqli_query($conexion,$update);
	if ($ejecutar)
		{
			// header("Location: perfil.php");
			echo "<script> 
							windows.open('perfil.php?') 
						</script> ";	
			} else
			{ echo "<script> alert ('no se pudo EDITAR') </script> "; } }
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
						echo "<script> 
							windows.open('perfil.php?') 
						</script> ";	
		}
    }
    	// unset($_POST['borrar']);
?>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="registro.css" rel="stylesheet" type="text/css" >
  <title>Formulario Registro</title>
</head>
<body>

<body>
  <header class="header">
    <div class="menu">
      <nav>
          <ul>
            <a href="roles/proyecto_formativo.html"><img class="logo" src="imagenes/logo2.png"></a>  
            <li><a></a></li>
              <li><a></a></li>
              <li><a></a></li>
              <li></li>
            <li><a href="proyecto_formativo.php">Atras</a></li>
            <!-- <li><a href="proyecto_formativo.html">Inicio</a></li> -->
            <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
           <!--  <li><a href="servicios.html">Servicios</a></li> -->
            <!-- <li><a href="#">Blog</a></li> -->
            <li></li>
            <!-- <li><a href="Perfil.html">Perfil</a></li> -->
          </ul>
      </nav>
    </div>
  </header>

  <section class="form-register">
    <h4 align="center">Formulario Registro</h4>
    <form method="POST" action="#">
          <input class="controls" type="text" name="usuario" required="" placeholder="Ingrese su Nombre" pattern="[a-z]{4,8}">
          <input class="controls" type="password" name="clave"  required="" placeholder="Ingrese su Contraseña">
          <!-- <input class="controls" type="number"   name="idrol"   required="" placeholder="Ingrese Rol" min="1" max="3"><br> -->

        <select class="controls" name="idrol" required="">
        <option value="3">Usuario</option>
        </select>

          
          <a>
            <input class="controls" type="submit" value="registro" name="insertar">
          </a>

          <div align="center">
            <a href="proyecto_formativo.php" class="button" >Atras</a>
          </div>
    </section>

    </form>
   <?php
    $conexion=mysqli_connect('localhost','root','','roladmin') or die ('problems en la conexion');

    if(isset($_POST['insertar']))
      {
      $usuario = $_POST['usuario'];
      $clave   = $_POST['clave'];
      $idrol   = $_POST['idrol'];

      $insertar = "INSERT INTO usuarios (nomusuario,clave,idrol) VALUES ('$usuario', '$clave', '$idrol')";
      $ejecutar=mysqli_query($conexion,$insertar);
      if ($ejecutar)
        {
          header("Location: inicio_sesion.php");
        }
      
      }
    ?>
   
</body>
</html>
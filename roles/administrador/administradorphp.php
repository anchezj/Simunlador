<?php
include_once 'conexionPDO.php';
session_start();
if(!isset($_SESSION['rol']))
      {
            header('location: inicio_sesion.php');
      }
else
      {
            if($_SESSION['rol'] !=1)
                  {
                        header('location: inicio_sesion.php');
                  }
      }
?>

<!doctype html>
<html lang="es">
<head>
      <meta charset="UTF-8" >
      <title>BIENVENIDO</title>
      <link href="administradorphp.css" rel="stylesheet" >
 
 
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
            <li><a></a></li>
            <li><a href="../proyecto_formativo.php">Atras</a></li>
            <li><a href="../proyecto_formativo.php">Inicio</a></li>
            
           <!--  <li><a href="servicios.html">Servicios</a></li> -->
            <!-- <li><a href="#">Blog</a></li> -->
            <li><a href="perfil.php">Perfil</a></li>
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
                  $usuario = $_SESSION['nomusuario'];
      ?>
  <br><br><br>
      <div id="titulo">
            <p id="header">BIENVENIDO ADMINISTRAD@R <?php echo $usuario ?> AL SIMULADOR DE PRESTAMOS</p>
      </div>
<center>    
      <header class="header1">          
            <div class="contenedor" id="uno">
                  <img class="icon" src="imagenes/tarjetas.png">
            </div>
             <div class="contenedor1" id="dos">
                  <img class="icon" src="imagenes/seguro.png">
            </div>

      </header> 
</center>
<center>      
<a href="simulador.html" class="button">prestamos bancarios y seguros</a>


       </body>
</html>
<!DOCTYPE html>
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="seguros.css" rel="stylesheet" >
	<meta charset="utf-8">
	<title>seguros bancarios</title>
</head>
<body>
 
    <header class="header">
    <div class="menu">
      <nav>
          <ul>
            <a href="roles/proyecto_formativo.html"><img class="logo" src="imagenes/logo2.png"></a>  

            <li>
                  <form action="../inicio_sesion.php" method="POST">
                        <font> 
                              <b><input class="button2" type="submit" name="cerrar_sesion" value="CERRAR SESION"></b>
                        </font>
                  </form>
<!--                   <a href="inicio_sesion.php">Cerrar sesion</a></li> -->
            </li>
            <li><a href="usuario.html">Atras</a></li>
            <li><a href="../proyecto_formativo.html">Inicio</a></li>
            <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
           <!--  <li><a href="servicios.html">Servicios</a></li> -->
            <!-- <li><a href="#">Blog</a></li> -->
            <li><a href="contactos.html">Contacto</a></li>
            <li><a href="Perfil.html">Perfil</a></li>
          </ul>
      </nav>
    </div>
  </header>

  

<br><br><br><br><br><br><br><br><br>
<center>
	<?php
     include_once '../conexionseguros.php';

	?>
</center>
</body>
</html>
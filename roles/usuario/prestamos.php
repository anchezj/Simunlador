
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="prestamos.css">
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
            

            <li><a href="usuariophp.php">Atras</a></li>
            <li><a href="../proyecto_formativo.php">Inicio</a></li>
            <li><a href="sobrenosotros.html">Sobre nosotros</a></li>
           <!--  <li><a href="servicios.html">Servicios</a></li> -->
            <!-- <li><a href="#">Blog</a></li> -->
            <li><a href="contactos.html">Contacto</a></li>
            <li><a href="perfilusuario.php">Perfil</a></li>
            
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
<br><br><br><br><br><br><br><br><br>
<center>
	<?php
	
     include_once '../conexionprestamos.php';

	?>
</center>
</body>
</html>
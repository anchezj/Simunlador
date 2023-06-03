<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="inicio_sesion.css" rel="stylesheet" type="text/css" >
  <title>iniciar sesion</title>
    <title></title>
</head>
<body>

  <header class="header">
    <div class="menu">
      <nav>
          <ul>
            <a href="#"><img class="logo" src="imagenes/logo2.png"></a>  
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
           <!--  <li><a href="Perfil.html">Perfil</a></li> -->
          </ul>
      </nav>
    </div>
  </header>
    
      <section class="form-register">
    <div align="center">
        <h2>Inicio de Sesion</h2><br><br>
            <form method="POST" action="#">
                <input class="controls" type="text" name="nombreusuario" placeholder="Nombre de usuario"><br>
                <input class="controls" type="password" name="contrasena" placeholder="Ingrese su Clave"><br>
                <input class="controls" type="submit" value="Iniciar Sesion"><br>
                <a href="registro.php" class="button">crear cuenta</a><br>
                <a href="proyecto_formativo.php" class="button">Atras</a>  
            </form>
    </div>
<?php
include_once 'conexionPDO.php';
session_start();
if(isset($_POST['cerrar_sesion']))
    {
        session_unset();
        session_destroy();
    }
if(isset($_SESSION['rol']))
    {
        switch ($_SESSION['rol']) 
        {
            case 1:
                header('Location: administrador/administradorphp.php');
                break;
            case 2:
                header('Location: empleado/empleadophp.php');
                break;
            case 3:
                header('Location: usuario/usuariophp.php');
                break;
            default:
                echo "Este rol no existe dentro de las opciones";
                break;
        }
    }
if (isset($_POST['nombreusuario']) && isset($_POST['contrasena']))
    {
        $username=$_POST['nombreusuario'];
        $password=$_POST['contrasena'];

        $db=new Database();
        $query=$db->connectar()->prepare('SELECT * FROM usuarios WHERE nomusuario=:nombreusuario AND clave=:contrasena');
        $query->execute(['nombreusuario'=>$username,'contrasena'=>$password]);
        $arreglofila=$query->fetch(PDO::FETCH_NUM);

        if ($arreglofila == true ) 
            {
                $rol=$arreglofila[3];
                $_SESSION['rol']=$rol;
                switch ($rol) 
                {
                    case 1:
                        header('Location: administrador/administradorphp.php');
                        break;
                    case 2:
                        header('Location: empleado/empleadophp.php');
                        break;
                    case 3:
                        header('Location: usuario/usuariophp.php');
                        break;
                    default:
                        echo "Este rol no existe dentro de las opciones";
                        break;
                }
                $usuario=$arreglofila[1];
                $_SESSION['nomusuario']=$usuario;

                $password=$arreglofila[2];
                $_SESSION['clave']=$password; 

                $fotosesion=$arreglofila[4];
                $_SESSION['foto']=$fotosesion;  

                $_SESSION['idusuario']= $arreglofila[0];
            }
            else
            {
                ?><h4 align="center"><?php echo 'Nombre de usuario o contraseña incorrecto'?></h4> <?php 
            }

    }
?>    

</body>
</html>
<?php 
//datos de la base de datos 
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "roladmin";
//creacion de la conexion a la base de datos con mysqli 
$conexion=mysqli_connect($servidor,$usuario,"") or die ("no ha sido posible la conexion al servidor"); 
// seleccionando la base de datos a emplear
$selecbasededatos=mysqli_select_db($conexion,$basededatos) or die (" no se a conectado a la base de datos");
// realizamos la consulta de la tabla respectiva
$consulta= "SELECT *FROM prestamos ";
//almacenamos la consulta 
$resultado=mysqli_query($conexion,$consulta) or die ("algo salio mal en la consulta de la base de datos");
echo "<table border='3'> ";
echo "<tr> ";
echo "<th>tipo prestamo</th> ";
echo "<th>cuota</th> ";
echo "<th>valor</th> ";
echo "<th>tasa mes</th> ";
echo "<th>vencimiento</th> ";
echo "<th>intereses</th> ";
echo "<th>detalle</th> ";
echo "<th>editar</th> ";
echo "<th>borrar</th> ";

echo "</tr> ";
while ($columna = mysqli_fetch_array($resultado)) 
{
	echo "<tr> ";
	echo "<td>".$columna['tipo prestamo']."</td> ";
    echo "<td>".$columna['cuota']."</td> ";
    echo "<td>".$columna['valor']."</td> ";
    echo "<td>".$columna['tasa mes']."</td> ";
    echo "<td>".$columna['vencimiento']."</td> ";
    echo "<td>".$columna['intereses']."</td> ";
    echo "<td>".$columna['detalle']."</td> ";
    echo "<td>".$columna['editar']."</td> ";
    echo "<td>".$columna['borrar']."</td> ";
    echo "</tr> ";
}
echo "</table>";
mysqli_close($conexion);
?>
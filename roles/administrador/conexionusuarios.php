<?php
?>

<?php
$usuario = "root";
$password = "";
$servidor = "localhost";
$basededatos = "roladmin";
//creacion de la conexion a la base de datos con mysqli 
$conexion=mysqli_connect($servidor,$usuario,"") or die ("no ha sido posible la conexion al servidor"); 
// seleccionando la base de datos a emplear
$selecbasededatos=mysqli_select_db($conexion,$basededatos) or die (" no se a conectado a la base de datos");
// realizamos la consulta de la tabla respectiva
$consulta= "SELECT *FROM usuarios ";
//almacenamos la consulta 
$resultado=mysqli_query($conexion,$consulta) or die ("algo salio mal en la consulta de la base de datos");

echo "<table border='3'> ";
echo "<thead> ";
echo "<tr> ";
echo "<th>id</th> ";
echo "<th>nomusuario</th> ";
echo "<th>clave</th> ";
echo "<th>idrol</th> ";
// echo "<th>foto</th> ";
echo "</tr> ";
echo "</thead> ";
while ($columna = mysqli_fetch_array($resultado)) 
{
    echo "<tr> ";
        echo "<td>".$columna['id']."</td> ";
        echo "<td>".$columna['nomusuario']."</td> ";
        echo "<td>".$columna['clave']."</td> ";
        echo "<td>".$columna['idrol']."</td> ";
        // echo "<td>".$columna['foto']."</td> ";  
    echo "</tr> ";
}
echo "</table>";
mysqli_close($conexion);

?>
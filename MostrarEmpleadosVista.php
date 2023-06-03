<?php
session_start();
?>

<head>
    <link rel='stylesheet' href='http://localhost/PapeleriaRosita/assetsPapeleria/estilos.css'>

</head>

<header class='encabezado'>
Papeleria Rosita
<hr>
</header>

<?php
include 'conexion.php';

$cadenaSQL = "SELECT * FROM usuario";
$resultado = mysqli_query($conexion, $cadenaSQL);
echo "<div class = 'container'>";
echo "<div class = 'table_wraper'>";
echo "<table align='center' class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th>Identificación</th>";
echo "<th>Tipo de identificación</th>";
echo "<th>Nombre</th>";
echo "<th>Apellido</th>";
echo "<th>Rol</th>";
echo "<th>Edad</th>";
echo "<th>Estado</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($fila = mysqli_fetch_array($resultado)) {

    print("<tr><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td><td>$fila[6]</td><td>$fila[7]</td></tr>");
}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "<br><center><a href='MenuEmpleadoVista.php'>Volver</a></center>";

echo "</div>";
echo "</body>";
?>
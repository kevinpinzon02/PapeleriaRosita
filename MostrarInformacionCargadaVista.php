<?php
session_start();
echo "<head>";
echo "<link rel='stylesheet' href='http://localhost/PapeleriaRosita/assetsPapeleria/estilos.css'>";
echo "</head>";

echo "<header class='encabezado'>";
echo "Constructora";
echo "<hr>";
echo "</header>";

$_tabla = $_POST['tabla'];
if ($_tabla == 'seleccionar') {
    echo "<script type='text/javascript'>
    alert('Debe seleccionar la tabla que desea visualizar');
    window.location.href='CargarInformacionVista.php';
    </script>";
}

echo "<body>";
echo "<div class='mostrar_tabla'>";
echo "<br><br><br>La tabla seleccionada es:
$_tabla";
echo "</div>";
$servername = "localhost";
$username = "kevin33";
$password = "password";
$dbname = "constructora";
$conn = mysqli_connect($servername, $username, $password, $dbname);


if (mysqli_connect_errno()) {
    printf("Connect failed: %sn", mysqli_connect_error());
    exit();
}

$cadenaSQL = "SELECT * FROM $_tabla";
$resultado = mysqli_query($conn, $cadenaSQL);
echo "<div class = 'container'>";
echo "<div class = 'table_wraper'>";
echo "<table align='center' class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>NOMBRE PAIS</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($fila = mysqli_fetch_array($resultado)) {

    print("<tr><td>$fila[0]</td><td>$fila[1]</td></tr>");
}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "<br><center><a href='CargarInformacionVista.php'>Volver a la pagina incial</a></center>";

echo "</div>";
echo "</body>";
?>
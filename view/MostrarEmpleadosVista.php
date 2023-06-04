<?php
session_start();
?>

<head>
<style scoped>   @import url("assetsPapeleria/estilos.css"); </style>

</head>

<header class='encabezado'>
Papeleria Rosita
<hr>
</header>

<?php
include '../persistence/conexion.php';

$cadenaSQL = "SELECT * FROM usuario";
$resultado = mysqli_query($conexion, $cadenaSQL);
?>
<div class = 'container'>
<div class = 'table_wraper'>
<table align='center' class='table'>
<thead>
<tr>
<th>Identificación</th>
<th>Tipo de identificación</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Rol</th>
<th>Edad</th>
<th>Estado</th>
</tr>
</thead>
<tbody>
<?php
while ($fila = mysqli_fetch_array($resultado)) {

    print("<tr><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td><td>$fila[6]</td><td>$fila[7]</td></tr>");
}
?>
</tbody>
</table>
</div>
<br><center><a href='MenuEmpleadoVista.php'>Volver</a></center>

</div>
</body>

<?php
/**
 * Script para ver a los empleados registrados
 * 
 * Este script se encarga de mostrar los empleados
 * 
 * @version 1.0
 * @author MonkeyMind
 * @last_modified Fecha de última modificación
 */
session_start();
?>

<head>
    <style scoped>
        @import url("assetsPapeleria//estilos.css");
    </style>

</head>

<header class='encabezado'>
    Papeleria Rosita - Empleados registrados
    <hr>
</header>

<?php
include '../persistence/conexion.php';

$cadenaSQL = "SELECT * FROM usuario";
$resultado = mysqli_query($conexion, $cadenaSQL);
?>
<div class='container'>
    <div class='scroll-pane'>
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
    <br>

    <center>
        <!-- <input type='button' value='Generar Reporte' class='btn_reporte'
            onclick="window.open('../informes/informeproductos_disponibles.php', '_blank');"> -->

        <br><br>
        <input type='button' value='Volver' class='btn_volver_reporte'
            onclick="window.location.href='MenuEmpleadoVista.php'">
    </center>

</div>
</body>
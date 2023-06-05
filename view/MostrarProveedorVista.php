<?php
/**
 * Script para ver a los proveedor registrados
 * 
 * Este script se encarga de mostrar los proveedores
 * 
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
    Papeleria Rosita - Registro de Proveedores
    <hr>
</header>

<?php
include '../persistence/conexion.php';

$cadenaSQL = "SELECT * FROM proveedor";
$resultado = mysqli_query($conexion, $cadenaSQL);
?>
<div class='container'>
    <div class='scroll-pane'>
        <table align='center' class='table'>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>NIT</th>
                    <th>Asesor</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = mysqli_fetch_array($resultado)) {

                    print("<tr><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td></tr>");
                }
                ?>
            </tbody>
        </table>
    </div>


    <input type='button' value='Volver' class='btn_volver_reporte'
        onclick="window.location.href='MenuProveedorVista.php'">


</div>
</body>
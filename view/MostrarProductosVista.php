<?php
session_start();
?>

<head>
    <style scoped>
        @import url("assetsPapeleria//estilos.css");
    </style>

</head>

<header class='encabezado'>
    Papeleria Rosita - Inventario
    <hr>
</header>

<?php
include '../persistence/conexion.php';

$cadenaSQL = "SELECT * FROM producto";
$resultado = mysqli_query($conexion, $cadenaSQL);
?>
<div class='container'>
        <div class='scroll-pane'>
            <table align='center' class='table'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Valor Compra</th>
                        <th>Valor Venta</th>
                        <th>Cantidad</th>
                        <th>Detalle Producto</th>
                        <th>Estado</th>
                        <th>Código</th>
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
        Reporte de productos disponibles:<input type='button' value='Generar Reporte' class='btn_reporte'
            onclick="window.open('../informes/informeproductos_disponibles.php', '_blank');">

        <br><br>

        Reporte de productos a punto de agotarse:<input type='button' value='Generar Reporte' class='btn_reporte'
            onclick="window.open('../informes/informesPRODUCTOS_A_PUNTO_DE_AGOTARSE.php', '_blank');">

        <br><br>
        <input type='button' value='Volver' class='btn_volver_reporte'
            onclick="window.location.href='MenuProductoVista.php'">
    </center>

</div>
</body>
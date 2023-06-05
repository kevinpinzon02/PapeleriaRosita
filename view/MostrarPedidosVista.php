<?php
session_start();
?>

<head>
    <style scoped>
        @import url("assetsPapeleria//estilos.css");
    </style>

</head>

<header class='encabezado'>
    Papeleria Rosita - Registro de Pedidos
    <hr>
</header>

<?php
include '../persistence/conexion.php';

$cadenaSQL = "SELECT * FROM pedido";
$resultado = mysqli_query($conexion, $cadenaSQL);
?>
<div class='container'>
    <div class='scroll-pane'>
        <table align='center' class='table'>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha realización</th>
                    <th>Fecha de llegada</th>
                    <th>Estado</th>
                    <th>Proveedor</th>
                    <th>Detalle pedido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = mysqli_fetch_array($resultado)) {

                    print("<tr><td>$fila[6]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[4]</td><td>$fila[5]</td><td>$fila[3]</td></tr>");
                }
                ?>
            </tbody>
        </table>
    </div>


    <input type='button' value='Volver' class='btn_volver_reporte'
        onclick="window.location.href='MenuPedidoVista.php'">


</div>
</body>
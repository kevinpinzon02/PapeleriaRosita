<?php

/**
 * Script para seleccionar una seccion
 * 
 * Este script se encarga de mostar el menu principal
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
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js' %3E></script>

</head>

<header class="encabezado">
    Papelería Rosita - Menu Inicial
    <hr>
</header>

<body>
    <form name='formME' id='formME' method='post' class='form_menu'>
        <h2 class="form_tittle_usu">¡Escoge el modulo!</h2>
        <br><br><br>
        <div class='form_container_menu'>
            <div class='form_campos_div_menu'>
                <input type='submit' name='emp' value='Empleado / Usuario' class='form_botones_menu'
                    onclick="this.form.action='MenuEmpleadoVista.php'">
                <br><br>
                <input type='submit' name='prov' value='Proveedor' class='form_botones_menu'
                    onclick="this.form.action='MenuProveedorVista.php'">
                <br><br>
                <input type='submit' name='ped' value='Pedido' class='form_botones_menu'
                    onclick="this.form.action='MenuPedidoVista.php'">
            </div>
            <div class='form_campos_div_menu'>
                <input type='submit' name='prod' value='Producto' class='form_botones_menu'
                    onclick="this.form.action='MenuProductoVista.php'">
                <br><br>
                <input type='submit' name='com' value='Compra' class='form_botones_menu'
                    onclick="this.form.action='MenuCompraVista.php'">
                <br><br>
                <input type='submit' name='ven' value='Venta' class='form_botones_menu'
                    onclick="this.form.action='MenuVentaVista.php'">
            </div>
        </div>
        <input type='submit' name='ven' value='Volver' class='form_boton_menu_volver'
            onclick="this.form.action='index.php'">
    </form>
</body>
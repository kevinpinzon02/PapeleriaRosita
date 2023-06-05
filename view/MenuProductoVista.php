<?php
/**
 * Script para ver opciones del producto
 * 
 * Este script se encarga de mostrar el menu con todas las funciones de los productos
 * 
 * 
 * @version 1.0
 * @author MonkeyMind
 * @last_modified Fecha de última modificación
 */
session_start();
?>

<head>
<style scoped>   @import url("assetsPapeleria/estilos.css"); </style>

    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'%3E></script>

</head>

<header class="encabezado">
    Papelería Rosita - Producto
    <hr>
</header>


<body>
    <form action='../controller/DAOBean.php' name='formME' id='formME'  method='post' class='form_todosMenus'>
        <div class='form_container'>

            <input type='submit' name='registrarpro' value='Registrar Producto' class='form_boton' onclick=this.form.action='RegistrarProductoVista.php'>
            <br><br>
            <input type='submit' name='mostrarpro' value='Mostrar Inventario de productos' class='form_boton'
                onclick=this.form.action='MostrarProductosVista.php'>
            <br><br>
            <input type='submit' name='eliminarpro' value='Eliminar Producto' class='form_boton'>
            <br><br>
            <input type='submit' name='vol_menu_usu' value='Volver' class = 'form_boton_menuPro_volver'
            onclick=this.form.action='Menu.php'>
        </div>
    </form>
</body>

<?php
    if (isset($_COOKIE['mensaje'])) {
        $mensaje = $_COOKIE['mensaje'];
        echo $mensaje;
        setcookie("mensaje", "", time() - 3600, "/"); 
    }
    
    ?>
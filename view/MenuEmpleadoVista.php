<?php
/**
 * Script para ver opciones de empleado
 * 
 * Este script se encarga de mostrar el menu con todas las funciones del empleado
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
        @import url("assetsPapeleria/estilos.css");
    </style>

    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js' %3E></script>

</head>

<header class="encabezado">
    Papelería Rosita - Empleado
    <hr>
</header>


<body>
    <form action='../controller/DAOBean.php' name='formME' id='formME' method='post' class='form'>
        <div class='form_container'>

            <input type='submit' name='registraremp' value='Registrar Empleado' class='form_boton'
                onclick=this.form.action='RegistrarEmpleadoVista.php'>
            <br><br>
            <input type='submit' name='mostraremp' value='Mostrar Empleados' class='form_boton'
                onclick=this.form.action='MostrarEmpleadosVista.php'>
            <br><br>
            <input type='submit' name='eliminaremp' value='Eliminar Empleado' class='form_boton'>
            <br><br>
            <input type='submit' name='asigUsu' value='Asignar Usuario' class='form_boton'
                onclick=this.form.action='AsignarUsuarioVista.php'>
            <br><br>
            <input type='submit' name='vol_menu_usu' value='Volver' class='form_boton_menuUsu_volver'
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
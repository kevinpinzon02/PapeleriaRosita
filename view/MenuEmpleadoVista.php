<?php
session_start();
?>

<head>
<style scoped>   @import url("assetsPapeleria/estilos.css"); </style>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
</head>

<header class="encabezado">
    Papelería Rosita - Empleado
    <hr>
</header>


<body>
    <form action='../controller/DAOBean.php' name='formME' id='formME'  method='post' class='form'>
        <div class='form_container'>

            <input type='submit' name='registraremp' value='Registrar Empleado' class='form_boton' onclick=this.form.action='RegistrarEmpleadoVista.php'>
            <br><br>
            <input type='submit' name='mostraremp' value='Mostrar Empleados' class='form_boton'
                onclick=this.form.action='MostrarEmpleadosVista.php'>
            <br><br>
            <input type='submit' name='editaremp' value='Editar Empleado' class='form_boton'
                onclick=this.form.action='pagina3.php'>
            <br><br>
            <input type='submit' name='eliminaremp' value='Eliminar Empleado' class='form_boton'>
        </div>
    </form>
</body>

<?php
    if (isset($_COOKIE['mensaje'])) {
        $mensaje = $_COOKIE['mensaje'];
        echo $mensaje;
        setcookie("mensaje", "", time() - 3600, "/"); 
    }

    elseif (isset($_COOKIE['mensaje2'])) {
        $mensaje = $_COOKIE['mensaje2'];
        echo $mensaje;
        setcookie("mensaje", "", time() - 3600, "/"); 
    }
    
    ?>
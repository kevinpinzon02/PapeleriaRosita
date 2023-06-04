<?php
session_start();

?>

<head>

    <style scoped>   @import url("assetsPapeleria/estilos.css"); </style>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>

</head>

<header class="encabezado">
    Papelería Rosita - Registrar Empleado
    <hr>
</header>


<body>
    <form action='../controller/DAOBean.php' name='form' id='form'  method='post' class='form_usu'>
        <h2 class="form_tittle_usu"> Iniciar sesión</h2>
        <div class='form_container_usu'>
            <div class = 'form_campos_div'>
                <div>
                    Nombre:
                    <br>
                    <input class='form_campos' name="nombre_usu" type="text" autocomplete="off" required>
                    <br><br>
                    contraseña:
                    <br>
                    <input class='form_campos' name="password_usu" type="password" autocomplete="off" required>
                    <br>
                </div>
            </div>
            <br><br>
            <div class = 'form_botones_usu'>
                <input type='submit' name='iniciar_sesion' value='Iniciar sesión' class='form_boton_usu_izq'>
                <input type='button' value='Volver' class='form_boton_usu_izq' 
                    onclick="window.location.href='MenuEmpleadoVista.php'">
                </div>
            <div class="text-right mb-2">
                <a href="../informes/informesventas_por_vendedor.php" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i>Generar reportes</a>
            </div>
    </form>
    <?php

    
    if (isset($_COOKIE['mensaje'])) {
        $mensaje = $_COOKIE['mensaje'];
        echo $mensaje;
        setcookie("mensaje", "", time() - 3600, "/"); 
    }
?>

</body>
<?php
session_start();

$servername = "localhost";
$username = "rosita";
$password = "123456";
$dbname = "papeleriarosita";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<head>

    <style scoped>
        @import url("assetsPapeleria/estilos.css");
    </style>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>

</head>

<header class="encabezado">
    Papelería Rosita - Asignar Usuario
    <hr>
</header>


<body>
    <form action='../controller/DAOBean.php' name='form' id='form' method='post' class='form_usu'>
        <h2 class="form_tittle_usu"> Asignar Usuario</h2>
        <div class='form_container_usu'><br>
            <div class='form_campos_div'>
                <div>
                    Identificación<br>del usuario:
                    <input class='form_campos' name="ident_usu" type="number" autocomplete="off" required>
                </div>
                <div><br>
                    Contraseña:
                    <input class='form_campos' name="contra_usu" type="password" autocomplete="off" style="left: 600px"
                        required>
                </div>
            </div>
            <br><br>
            <div class='form_botones_usu'>
                <input type='submit' name='asignar_usuario' value='Asignar' class='form_boton_usu_izq'>
                <input type='button' value='Volver' class='form_boton_usu_der'
                    onclick="window.location.href='MenuEmpleadoVista.php'">
            </div>
    </form>
    <?php

    if (isset($_COOKIE['mensaje'])) {
        $mensaje = $_COOKIE['mensaje'];
        echo $mensaje;
        setcookie("mensaje", "", time() - 3600, "/");
    }

    if (isset($_COOKIE['mensaje2'])) {
        $mensaje = $_COOKIE['mensaje2'];
        echo $mensaje;
        setcookie("mensaje2", "", time() - 3600, "/");
    }
    ?>

</body>
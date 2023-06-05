<?php
/**
 * Script para asignar un usuario en la aplicación de Papelería Rosita.
 * 
 * Este script se encarga de establecer la conexión con la base de datos y procesar el formulario
 * para asignar iniciar sesion. Además, muestra mensajes en caso de éxito o error en la asignación.
 * 
 * @version 1.0
 * @author MonkeyMind
 * @last_modified Fecha de última modificación
 */
session_start();

?>


<head>
    <style scoped>
        @import url("assetsPapeleria/login.css");
    </style>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>

</head>



<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <div class="text">
                    <span class="text-1">Papelería Rosita</span>
                    <span class="text-2"><br>En la aplicación, se podrán llevar <br> a cabo actividades diarias de la papelería.<br><br>
                    ¡Todo de una manera más facil! </span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Inicio de sesión</div>
                    <form action='../controller/DAOBean.php' name='form' id='form'  method='post' class='form_usu'>
                        <div class="input-boxes">
                            <div class="input-box">
                                <input type="text" name="nombre_usu" placeholder="Ingresa tu usuario (identificación)" required>
                            </div>
                            <div class="input-box">
                                <input type="password" name="password_usu" placeholder="Ingresa tu contraseña" required>
                            </div>
                            <div class="button input-box">
                                <input type="submit" name='iniciar_sesion' value="Ingresar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($_COOKIE['mensaje'])) {
        $mensaje = $_COOKIE['mensaje'];
        echo $mensaje;
        setcookie("mensaje", "", time() - 3600, "/");
    }
    ?>

</body>
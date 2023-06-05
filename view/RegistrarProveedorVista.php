<?php
/**
 * Script para registrar un proveedor
 * 
 * Este script se encarga de establecer la conexión con la base de datos y procesar el formulario
 * para registrar un proveedor
 * 
 * @version 1.0
 * @author MonkeyMind
 * @last_modified Fecha de última modificación
 */
session_start();

$servername = "localhost";
$username = "rosita";
$password = "123456";
$dbname = "papeleriarosita";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<head>

<style scoped>   @import url("assetsPapeleria/estilos.css"); </style>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>

</head>

<header class="encabezado">
    Papelería Rosita - Registrar Proveedor
    <hr>
</header>


<body>
    <form action='../controller/DAOBean.php' name='form' id='form'  method='post' class='form_usu'>
        <h2 class="form_tittle_usu"> Registrar Proveedor</h2>
        <div class='form_container_usu'>
            <div class = 'form_campos_div'>
                <div>
                        Nombre: 
                    <input class='form_campos' name="nombre_prov" type="text" autocomplete="off" required>
                    
                    <br><br>Direccion: 
                    <input class='form_campos' name="direccion_prov" type="text" autocomplete="off" required>

                    <br><br>NIT: 
                    <input class='form_campos' name="nit_prov" type="text" autocomplete="off" required>
                </div>
                <div>
                     Asesor:
                    <input class='form_campos' name="asesor_prov" type="text" autocomplete="off" style="left: 600px" required>
                    <br><br>Teléfono:
                    <input class='form_campos' name="telefono_prov" type="number" autocomplete="off" style="left: 600px" required>
                    <br><br>Estado:
                    <select class='form_campos' name='estado_prov' style="left: 600px">
                        <option value='seleccionar'>Seleccionar</option>
                        <option value='ACTIVO'>Activo</option>
                        <option value='INACTIVO'>Inactivo</option>
                    </select>
                </div>
            </div>
            <br><br>
            <div class = 'form_botones_usu'>
                <input type='submit' name='registrar_proveedor' value='Registrar' class='form_boton_usu_izq'>
                <input type='button' value='Volver' class='form_boton_usu_der' 
                    onclick="window.location.href='MenuProveedorVista.php'">
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
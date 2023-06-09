<?php
/**
 * Script para registrar un producto
 * 
 * Este script se encarga de establecer la conexión con la base de datos y procesar el formulario
 * para registrar un producto
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
    Papelería Rosita - Registrar Producto
    <hr>
</header>


<body>
    <form action='../controller/DAOBean.php' name='form' id='form'  method='post' class='form_usu'>
        <h2 class="form_tittle_usu"> Registrar Producto</h2>
        <div class='form_container_usu'>
            <div class = 'form_campos_div'>
                <div>
                            Nombre<br>producto: 
                    <input class='form_campos' name="nombre_prod" type="text" autocomplete="off" required>
                    
                    <br><br>Valor compra: 
                    <input class='form_campos' name="valorC_prod" type="number" autocomplete="off" required>
                    
                    <br><br>Codigo: 
                    <input class='form_campos' name="codigo_prod" type="text" autocomplete="off" required>

                    <br><br>Valor venta: 
                    <input class='form_campos' name="valorV_prod" type="number" autocomplete="off" required>
                    <br>
                </div>
                <div>
                        Cantidad: 
                    <input class='form_campos' name="cantidad_prod" type="number" autocomplete="off" style="left: 600px" required>
                    <br><br>Detalle del<br>producto:
                    <input class='form_campos' name="detalle_prod" type="text" autocomplete="off" style="left: 600px">

                    <br><br>Estado:
                    <select class='form_campos' name='estado_prod' style="left: 600px">
                        <option value='seleccionar'>Seleccionar</option>
                        <option value='ACTIVO'>Activo</option>
                        <option value='INACTIVO'>Inactivo</option>
                    </select>
                </div>
            </div>
            <br><br>
            <div class = 'form_botones_usu'>
                <input type='submit' name='registrar_producto' value='Registrar' class='form_boton_usu_izq'>
                <input type='button' value='Volver' class='form_boton_usu_der' 
                    onclick="window.location.href='MenuProductoVista.php'">
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
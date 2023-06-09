<?php
/**
 * Script para registrar un pedido
 * 
 * Este script se encarga de establecer la conexión con la base de datos y procesar el formulario
 * para registrar un pedido
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
    Papelería Rosita - Registrar Pedido
    <hr>
</header>


<body>
    <form action='../controller/DAOBean.php' name='form' id='form'  method='post' class='form_usu' >
        <h2 class="form_tittle_usu"> Registrar Pedido</h2>
        <div class='form_container_usu'>
            <div class = 'form_campos_div'>
                <div>
                    Fecha de<br>realización: 
                    <input class="form_campos" name="fechaRealizada_pedido" type="date" autocomplete="off" required placeholder="YYYY-MM-DD">
                    <br><br>
                    Fecha de<br>llegada: 
                    <input class="form_campos" name="fechaEspera_pedido" type="date" autocomplete="off" required placeholder="YYYY-MM-DD">

                    <br><br>Proveedor:
                    <select class='form_campos' name='proveedor_pedido'>
                        <option value='seleccionar'>Seleccionar</option>

                    <?php 
                    $getTipoID = "select * from proveedor order by id_proveedor";
                    $getTipoID2 = mysqli_query($conn,$getTipoID) or die(mysqli_error($conn));

                    foreach ($getTipoID2 as $opciones): ?>
                        <option value ="<?php echo $opciones['id_proveedor'] ?>"><?php echo $opciones['nombre'] ?></option>
                    <?php endforeach ?>
                    </select>

                </div>
                <div>
                    Estado:
                    <select class='form_campos' name='estado_pedido' style="left: 600px">
                        <option value='seleccionar'>Seleccionar</option>
                        <option value='ACTIVO'>Activo</option>
                        <option value='INACTIVO'>Inactivo</option>
                    </select>

                    <br><br>Código: 
                    <input class='form_campos' style="left: 600px" name="codigo_pedido" type="text" autocomplete="off" required>

                    <br><br>Detalle<br>pedido: 
                    <input class='form_campos' style="left: 600px" name="detalle_pedido" type="text" autocomplete="off" required>

                </div>
            </div>
            <br><br>
            <div class = 'form_botones_usu'>
                <input type='submit' name='registrar_pedido' value='Registrar' class='form_boton_usu_izq'>
                <input type='button' value='Volver' class='form_boton_usu_izq' 
                    onclick="window.location.href='MenuPedidoVista.php'">
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
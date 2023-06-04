<?php
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
    <form action='../controller/DAOBean.php' name='form' id='form'  method='post' class='form_usu'>
        <h2 class="form_tittle_usu"> Registrar Pedido</h2>
        <div class='form_container_usu'>
            <div class = 'form_campos_div'>
                <div>

                    Valor de <br> la compra: 
                    <input class="form_campos" name="fecha_esperada" type="number" autocomplete="off" required>

                    <br><br>Fecha Compra: 
                    <input class="form_campos" name="fecha_esperada" type="date" autocomplete="off" required>

                    <br><br>Cantidad Productos: 
                    <input class="form_campos" name="fecha_esperada" type="number" autocomplete="off" required>

                    Estado:
                    <select class='form_campos' name='estado_usu' style="left: 600px">
                        <option value='seleccionar'>Seleccionar</option>
                        <option value='ACTIVO'>Activo</option>
                        <option value='INACTIVO'>Inactivo</option>
                    </select>


                </div>
                <div>
                    detalle compra: 
                    <input class='form_campos' style="left: 600px" name="apellido_usu" type="text" autocomplete="off" required>

                    <br><br>detalle pedido: 
                    <input class='form_campos' style="left: 600px" name="nombre_usu" type="text" autocomplete="off" required>

                    <br><br>Seleccionar<br>Pedido:
                    <select class='form_campos' name='tipo_iden_usu' style="left: 600px">
                        <option value='seleccionar'>Seleccionar</option>

                    <?php 
                    $getTipoID = "select * from pedido order by id_pedido";
                    $getTipoID2 = mysqli_query($conn,$getTipoID) or die(mysqli_error($conn));

                    foreach ($getTipoID2 as $opciones): ?>
                        <option value ="<?php echo $opciones['id_pedido'] ?>"><?php echo $opciones['codigo'] ?></option>
                    <?php endforeach ?>
                    </select>

                    <br><br>Seleccionar<br>usuario:
                    <select class='form_campos' name='tipo_iden_usu' style="left: 600px">
                        <option value='seleccionar'>Seleccionar</option>

                    <?php 
                    $getTipoID = "select * from usuario order by id_usuario";
                    $getTipoID2 = mysqli_query($conn,$getTipoID) or die(mysqli_error($conn));

                    foreach ($getTipoID2 as $opciones): ?>
                        <option value ="<?php echo $opciones['id_usuario'] ?>"><?php echo $opciones['nombre'] ?></option>
                    <?php endforeach ?>
                    </select>

                </div>
            </div>
            <br><br>
            <div class = 'form_botones_usu'>
                <input type='submit' name='registrar_empleado' value='Registrar' class='form_boton_usu_izq'>
                <input type='button' value='Volver' class='form_boton_usu_izq' 
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
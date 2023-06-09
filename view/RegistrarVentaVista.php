<?php
/**
 * Script para registrar una venta
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

    <style scoped>
        @import url("assetsPapeleria/estilos.css");
    </style>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>

</head>

<header class="encabezado">
    Papelería Rosita - Registrar Venta
    <hr>
</header>


<body>
    <form action='../controller/DAOBean.php' name='form' id='form' method='post' class='form_usu'>
        <h2 class="form_tittle_usu"> Registrar Venta</h2>
        <div class='form_container_usu'>
            <div class='form_campos_div'>
                <div>

                    Valor venta:
                    <input class="form_campos" name="valor_venta" type="number" autocomplete="off" required>

                    <br><br>Fecha venta:
                    <input class="form_campos" name="fecha_venta" type="date" autocomplete="off" required>

                    <br><br>Detalle venta:
                    <input class="form_campos" name="detalle_venta" type="text" autocomplete="off" required>

                    <br><br>Seleccionar<br>usuario:
                    <select class='form_campos' name='usuario_venta'>
                        <option value='seleccionar'>Seleccionar</option>

                        <?php
                        $getTipoID = "select * from usuario order by id_usuario";
                        $getTipoID2 = mysqli_query($conn, $getTipoID) or die(mysqli_error($conn));

                        foreach ($getTipoID2 as $opciones) : ?>
                            <option value="<?php echo $opciones['id_usuario'] ?>"><?php echo $opciones['nombre'] ?></option>
                        <?php endforeach ?>
                    </select>



                </div>
                <div>
                    Estado:
                    <select class='form_campos' name='estado_venta' style="left: 600px">
                        <option value='seleccionar'>Seleccionar</option>
                        <option value='ACTIVO'>Activo</option>
                        <option value='INACTIVO'>Inactivo</option>
                    </select>

                    <br><br>codigo:
                    <input class='form_campos' style="left: 600px" name="codigo_venta" type="text" autocomplete="off" required>

                    <br><br>detalle venta:
                    <input class='form_campos' style="left: 600px" name="detalle_venta" type="text" autocomplete="off" required>

                </div>
                </div>
    </form>
    <div class="scroll-pane">
        <table>
            <thead>
                <tr>
                    <th>Nombre del producto</th>
                    <th>Cantidad</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // ... Código PHP para obtener los productos de la base de datos ...
                $query = "SELECT id_producto, nombre_producto FROM producto";
                $result = mysqli_query($conn, $query);
                $productos = mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach ($productos as $producto) {
                    echo "<tr>";
                    echo "<td>" . $producto['nombre_producto'] . "</td>";
                    echo "<td><input type='number' name='cantidad_producto[]' value='0'></td>";
                    echo "<td><input type='checkbox' name='seleccion_producto[]' value='" . $producto['id_producto'] . "'></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <br><br>
    <div class='form_botones_usu'>
        <input type='submit' name='registrar_venta' value='Registrar' class='form_boton_usu_izq'>
        <input type='button' value='Volver' class='form_boton_usu_izq' onclick="window.location.href='MenuEmpleadoVista.php'">
    </div>

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
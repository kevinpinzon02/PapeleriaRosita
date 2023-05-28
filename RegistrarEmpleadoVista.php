<?php
session_start();
require_once('ConexionBD.php');

$servername = "localhost";
$username = "rosita";
$password = "123456";
$dbname = "papeleriarosita";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<head>
    <link rel='stylesheet' href='http://localhost/PapeleriaRosita/assetsPapeleria/estilos.css'>

</head>

<header class="encabezado">
    Papelería Rosita - Registrar Empleado
    <hr>
</header>


<body>
    <form action='DAOBean.php' name='form' id='form'  method='post' class='form_usu'>
        <h2 class="form_tittle_usu"> Registrar empleado</h2>
        <div class='form_container_usu'>
            <div class = 'form_campos_div'>
                <div>
                    Identificación: 
                    <input class='form_campos' name="identificacion_usu" type="text" autocomplete="off"/>
                    <br><br>Tipo de<br>Identificación:
                    <select class='form_campos' name='tipo_iden_usu'>
                        <option value='seleccionar'>Seleccionar</option>

                    <?php 
                    $getTipoID = "select * from tipo_identificacion order by id_tipo_identificacion";
                    $getTipoID2 = mysqli_query($conn,$getTipoID) or die(mysqli_error($conn));

                    foreach ($getTipoID2 as $opciones): ?>
                        <option value ="<?php echo $opciones['id_tipo_identificacion'] ?>"><?php echo $opciones['nombre_identificacion'] ?></option>
                    <?php endforeach ?>
                    </select>
                    
                    <br><br>Nombre: 
                    <input class='form_campos' name="nombre_usu" type="text" autocomplete="off"/>

                    <br><br>Apellido: 
                    <input class='form_campos' name="apellido_usu" type="text" autocomplete="off"/>
                    <br>
                </div>
                <div>
                    Edad: 
                    <input class='form_campos' name="edad_usu" type="number" autocomplete="off" style="left: 600px"/>
                    <br><br>Rol:
                    <select class='form_campos' name='rol_usu' style="left: 600px">
                        <option value='seleccionar'>Seleccionar</option>
                        <option value='ADMINISTRADOR'>Administrador</option>
                        <option value='EMPLEADO'>Empleado</option>
                    </select>
                    <br><br>Celular:
                    <input class='form_campos' name="telefono_usu" type="number" autocomplete="off" style="left: 600px"/>
                    <br><br>Estado:
                    <select class='form_campos' name='estado_usu' style="left: 600px">
                        <option value='seleccionar'>Seleccionar</option>
                        <option value='ACTIVO'>Activo</option>
                        <option value='INACTIVO'>Inactivo</option>
                    </select>
                </div>
            </div>
            <br><br>
            <div class = 'form_botones_usu'>
                <input type='submit' name='registrar_empleado' value='Registrar' class='form_boton_usu_izq'>
                <input type='submit' value='Volver' class='form_boton_usu_izq'
                    onclick=this.form.action='MenuEmpleadoVista.php'>
                </div>
        </div>
    </form>

</body>
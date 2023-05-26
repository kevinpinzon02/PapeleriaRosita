<?php
session_start();
?>

<head>
    <link rel='stylesheet' href='http://localhost/PapeleriaRosita/assetsPapeleria/estilos.css'>

</head>

<header class="encabezado">
    Papelería Rosita - Registrar Empleado
    <hr>
</header>


<body>
    <form action='EmpleadoDAO.php' name='form' id='form'  method='post' class='form_usu'>
        <h2 class="form_tittle_usu"> Registrar empleado</h2>
        <div class='form_container_usu'>
            <div class = 'form_campos_div'>
                <div>
                    Identificación: 
                    <input class='form_campos' name="identificacion_usu" type="text" autocomplete="off"/>
                    <br><br>Tipo de<br>Identificación:
                    <select class='form_campos' name='tipo_iden_usu'>
                        <option value='seleccionar'>Seleccionar</option>
                        <option value='1'>Cédula de ciudadanía</option>
                        <option value='2'>Cédula de extranjería</option>
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
                        <option value='Administrador'>Administrador</option>
                        <option value='Usuario'>Usuario</option>
                    </select>
                    <br><br>Celular:
                    <input class='form_campos' name="telefono_usu" type="number" autocomplete="off" style="left: 600px"/>
                    <br><br>Estado:
                    <select class='form_campos' name='estado_usu' style="left: 600px">
                        <option value='seleccionar'>Seleccionar</option>
                        <option value='Activo'>Activo</option>
                        <option value='Inactivo'>Inactivo</option>
                    </select>
                </div>
            </div>
            <br><br>
            <div class = 'form_botones_usu'>
                <input type='submit' name='submit' value='Registrar' class='form_boton_usu_izq'>
                <input type='submit' value='Volver' class='form_boton_usu_izq'
                    onclick=this.form.action='MenuEmpleadoVista.php'>
                </div>
        </div>
    </form>

</body>
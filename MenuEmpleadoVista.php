<?php
session_start();
?>

<head>
    <link rel='stylesheet' href='http://localhost/PapeleriaRosita/assetsPapeleria/estilos.css'>

</head>

<header class="encabezado">
    Papelería Rosita - Empleado
    <hr>
</header>


<body>
    <form action='' name='form' id='form'  method='post' class='form'>
        <div class='form_container'>

            <input type='submit' name='registraremp' value='Registrar Empleado' class='form_boton' onclick=this.form.action='RegistrarEmpleadoVista.php'>
            <br><br>
            <input type='submit' name='mostraremp' value='Mostrar Empleados' class='form_boton'
                onclick=this.form.action='MostrarEmpleadosVista.php'>
            <br><br>
            <input type='submit' name='editaremp' value='Editar Empleado' class='form_boton'
                onclick=this.form.action='pagina3.php'>
            <br><br>
            <input type='submit' name='eliminaremp' value='Eliminar Empleado' class='form_boton'
                onclick=this.form.action='pagina3.php'>
        </div>
    </form>
</body>
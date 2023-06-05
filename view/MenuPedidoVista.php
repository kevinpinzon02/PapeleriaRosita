<?php
session_start();
?>

<head>
<style scoped>   @import url("assetsPapeleria/estilos.css"); </style>

    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'%3E></script>

</head>

<header class="encabezado">
    Papelería Rosita - Pedido
    <hr>
</header>


<body>
    <form action='../controller/DAOBean.php' name='formME' id='formME'  method='post' class='form_todosMenus'>
        <div class='form_container'>

            <input type='submit' name='registrarped' value='Registrar Pedido' class='form_boton' onclick=this.form.action='RegistrarPedidoVista.php'>
            <br><br>
            <input type='submit' name='mostrarped' value='Mostrar Pedidos' class='form_boton'
                onclick=this.form.action='MostrarPedidosVista.php'>
            <br><br>
            <input type='submit' name='eliminarped' value='Eliminar Pedido' class='form_boton'>
            <br><br>
            <input type='submit' name='vol_menu_usu' value='Volver' class = 'form_boton_menuPro_volver'
            onclick=this.form.action='Menu.php'>
        </div>
    </form>
</body>

<?php
    if (isset($_COOKIE['mensaje'])) {
        $mensaje = $_COOKIE['mensaje'];
        echo $mensaje;
        setcookie("mensaje", "", time() - 3600, "/"); 
    }
    
    ?>
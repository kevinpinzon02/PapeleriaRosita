<?php
session_start();
?>

<head>
<style scoped>   @import url("assetsPapeleria/estilos.css"); </style>
    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
    <script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>
</head>

<header class="encabezado">
    Papelería Rosita - Cargar Información Excel
    <hr>
</header>


<body>
    <form action='CargarInformacionBD.php' name='form' id='form' enctype='multipart/form-data' method='post' class='form'>
        <h2 class="form_tittle"> Carga y Búsqueda de información en la base de datos</h2>
        <div class='form_container'>
            <div class='form_group'>
                Modulo:
                <select name='tabla' class='form_combo'>
                    <option value='seleccionar'>Seleccionar</option>
                    <option value='pais'>Pais</option>
                </select>
            </div>

            <br><br><input id="agregar" type='file' name='file' value='Buscar archivo' class='form_file'
                accept='.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel' />
            <br><br><input type='submit' name='submit' value='Cargar' class='form_boton' />
            <br><br><input text type='submit' value='Ver datos' class='form_boton'
                onclick=this.form.action='MostrarInformacionCargadaVista.php'>
        </div>
    </form>
</body>
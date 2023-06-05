<?php
session_start();

echo "<head>";
echo "<link rel='stylesheet' href='http://localhost/PapeleriaRosita/assetsPapeleria/estilos.css'>";
echo "</head>";

echo "<header class='encabezado'>";
echo "Constructora";
echo "<hr>";
echo "</header>";

// Obtener el valor del formulario enviado por POST
$_tabla = $_POST['tabla'];
// Validar si se ha seleccionado una tabla
if ($_tabla == 'seleccionar') {
    echo "<script type='text/javascript'>
    alert('Debe seleccionar la tabla que desea cargar');
    window.location.href='pagina1.php';
    </script>";
}

echo "<body>";
echo "<div class='mostrar_tabla'>";
echo "<br><br><br>La tabla seleccionada es:
$_tabla";
echo "</div>";

$servername = "localhost";
$username = "rosita";
$password = "123456";
$dbname = "papeleriarosita";

// Conectar a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);
$cantidad = 0;
$cantidadMalos = 0;

// Verificar si la conexión fue exitosa
if (mysqli_connect_errno()) {
    printf("Connect failed: %sn", mysqli_connect_error());
    exit();
}

// Verificar si se ha enviado un archivo y si ha sido correctamente cargado
if (isset($_FILES["file"]) && is_uploaded_file($_FILES['file']['tmp_name'])) {
    $fp = fopen($_FILES['file']['tmp_name'], "r");
    while (!feof($fp)) {
        $columna = explode(";", fgets($fp));
        if ($_tabla == "pais") {
            $cantidad++;
            $sql = "INSERT INTO pais VALUES(" . 0 . ", '" . $columna[0] . "');";

            // Ejecutar la consulta SQL para insertar los datos en la base de datos
            if ((mysqli_query($conn, $sql)) === false) {
                $cantidadMalos++;
                die("Ha ocurrido un error al subir el archivo: " . mysqli_error($conn));
            }
        }
    }
    // Verificar si no se han producido errores durante la carga de datos
    if ($cantidadMalos == 0) {
        echo "<script type='text/javascript'>
        alert('Se han registrado los datos en la base de datos de mánera exitosa');
        </script>";
    }
    // Obtener los registros de la tabla seleccionada y mostrarlos en una tabla HTML
    $cadenaSQL = "SELECT * FROM $_tabla";
    $resultado = mysqli_query($conn, $cadenaSQL);

    echo "<div class = 'container'>";
    echo "<div class = 'table_wraper'>";
    echo "<table align='center' class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>NOMBRE PAIS</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($fila = mysqli_fetch_array($resultado)) {

        print("<tr><td>$fila[0]</td><td>$fila[1]</td></tr>");
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "<br><center><a href='pagina1.php'>Volver a la pagina incial</a></center>";
    echo "</div>";
    echo "</body>";
} else {
    echo "<script type='text/javascript'>
                alert('Error de subida. Contactese con el administrador del softwware para compatibilizar la información');
                //window.location.href='index.php';
                </script>";
}
?>
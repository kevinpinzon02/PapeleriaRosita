<?php

session_start();


require_once('../persistence/EmpleadoDAO.php');
require_once('../model/EmpleadoDTO.php');

require_once('../persistence/ProveedorDAO.php');
require_once('../model/ProveedorDTO.php');

require_once('../persistence/conexion.php');

require_once('../persistence/ProductoDAO.php');
require_once('../model/ProductoDTO.php');

require_once('../persistence/VentaDAO.php');
require_once('../model/VentaDTO.php');


require_once('../persistence/conexion.php');
echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";

echo "<script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>";
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'%3E></script>";



//use persistence\EmpleadoDAO;
//use model\EmpleadoDTO;



/*
require_once('PedidoDAO.php');
require_once('PedidoDTO.php');

*/


if (isset($_POST['iniciar_sesion'])) {
      $nombre_usuario = $_POST['nombre_usu'];
      $contrasena = $_POST['password_usu'];


      $newusuario = new EmpleadoDAO();
      $log = $newusuario->identificar($nombre_usuario, $contrasena);
      if ($log === true) {


            $_SESSION['identificacion'] = $nombre_usuario;
            $paginaPrincipal = '../view/Menu.php';
            header("Location: $paginaPrincipal");
            echo "se registro";
            exit();


      } else {
            $mensaje = "<script>
                        const aver = new Mensajes();
                        aver.ErrorUsuarioNoExiste();
                        </script>";
            redirigirUsuarioIncorrecto($mensaje);
      }

}

if (isset($_POST['registrar_empleado'])) {
      $IDENTIFICACION = $_POST['identificacion_usu'];
      $tipo = $_POST['tipo_iden_usu'];
      $nombre = $_POST['nombre_usu'];
      $apellido = $_POST['apellido_usu'];
      $edad = $_POST['edad_usu'];
      $celular = $_POST['telefono_usu'];
      $rol = $_POST['rol_usu'];
      $estado = $_POST['estado_usu'];

      if ($tipo == 'seleccionar') {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ErrorComboTI();
                        </script>";

            redirigirRegistrarEmpleado($mensaje);
      }

      if ($rol == 'seleccionar') {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ErrorComboRol();
                        </script>";

            redirigirRegistrarEmpleado($mensaje);
      }

      if ($estado == 'seleccionar') {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ErrorComboEstado();
                        </script>";

            redirigirRegistrarEmpleado($mensaje);
      }


      $newusuario = new EmpleadoDAO();
      $insert = $newusuario->insertar(new EmpleadoDTO($IDENTIFICACION, $tipo, $nombre, $apellido, $rol, $edad, $estado, $celular));

      if ($insert === 1) {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.AgregarEmpleado();
                        </script>";

      }

      if ($insert === 2) {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ExisteEmpleado();
                        </script>";

      }


      redirigirRegistrarEmpleado($mensaje);

}

// $actualizar =  $newusuario ->actualizar(NEW EmpleadoDTO($IDENTIFICACION ,$tipo, $nombre,$apellido,$rol,$edad,$estado,$celular)); 

/** --------------- REGISTRAR PROVEEDOR ---------------------------- */
if (isset($_POST['registrar_proveedor'])) {

      $nombre = $_POST['nombre_prov'];
      $telefono = $_POST['telefono_prov'];
      $direccion = $_POST['direccion_prov'];
      $nit = $_POST['nit_prov'];
      $asesor = $_POST['asesor_prov'];
      $estado = $_POST['estado_prov'];

      if ($estado == 'seleccionar') {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ErrorComboEstado();
                        </script>";

            redirigirRegistrarProveedor($mensaje);
      }


      $newprovedor = new ProveedorDAO();
      $insert = $newprovedor->insertar(new ProveedorDTO($nombre, $telefono, $direccion, $nit, $asesor, $estado));


      if ($insert === 1) {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.AgregarProveedor();
                        </script>";

      }

      if ($insert === 2) {
            $mensaje = "<script>
                        const instancia = new Mensajes();
                        instancia.ExisteProveedor();
                        </script>";

      }

      redirigirRegistrarProveedor($mensaje);

}

if (isset($_POST['eliminaremp'])) {

      $mensaje = "<script>
                  const instancia = new Mensajes();
                  instancia.EliminarEmpleado();
                  </script>";

      redirigirEliminarEmpleado($mensaje);

}
if (isset($_POST['valor'])) {
      $valor = $_POST['valor'];
      $newusuario = new EmpleadoDAO();
      $eliminar = $newusuario->eliminar($valor);

      $response = array('valor' => $eliminar);

      header('Content-Type: application/json');
      echo json_encode($response);
      exit; // Terminar la ejecución del script aquí
}






/**------------------------------------REDIRIGIR------------------------------------ */

function redirigirUsuarioIncorrecto($mensaje)
{
      setcookie("mensaje", $mensaje, time() + 3600, "/");
      $paginaPrincipal = '../view/index.php';
      header("Location: $paginaPrincipal");
      exit();
}

function redirigirRegistrarEmpleado($mensaje)
{
      setcookie("mensaje", $mensaje, time() + 3600, "/"); // Establecer la cookie con el mensaje
      $paginaPrincipal = '../view/RegistrarEmpleadoVista.php'; // Cambia 'index.php' por la URL de tu página principal
      header("Location: $paginaPrincipal");
      exit();
}

function redirigirRegistrarProveedor($mensaje)
{
      setcookie("mensaje", $mensaje, time() + 3600, "/"); // Establecer la cookie con el mensaje
      $paginaPrincipal = '../view/RegistrarProveedorVista.php'; // Cambia 'index.php' por la URL de tu página principal
      header("Location: $paginaPrincipal");
      exit();
}



function redirigirEliminarEmpleado($mensaje)
{
      setcookie("mensaje", $mensaje, time() + 3600, "/");
      $paginaPrincipal = '../view/MenuEmpleadoVista.php';
      header("Location: $paginaPrincipal");
      exit();
}


?>
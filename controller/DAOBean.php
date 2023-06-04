<?php

session_start();


require_once('../persistence/EmpleadoDAO.php');
require_once('../model/EmpleadoDTO.php');



require_once('../persistence/ProductoDAO.php');
require_once('../model/ProductoDTO.php');

echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
echo "<script src='http://localhost/PapeleriaRosita/view/js/Mensajes.js'></script>";

echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'%3E</script>";

//use persistence\EmpleadoDAO;
//use model\EmpleadoDTO;

/*
require_once('ProveedorDAO.php');
require_once('ProveedorDTO.php');

require_once('PedidoDAO.php');
require_once('PedidoDTO.php');

*/

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
      $newprocuto = new ProductoDAO();
      $insert2 = $newprocuto->actualizar(new ProductoDTO("pasta", 99, 99, 1199, "jabon fea", "act",17));
      // $eliminar =$newprocuto->eliminar("papa");
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
      // $actualizar =  $newusuario ->actualizar(NEW EmpleadoDTO($IDENTIFICACION ,$tipo, $nombre,$apellido,$rol,$edad,$estado,$celular)); 
      //$newprovedor = new ProveedorDAO(); 
      //$insert =  $newprovedor ->insertar(NEW ProveedorDTO("jota","653","dcj","pit","ase","A"));
}

if (isset($_POST['eliminaremp'])) {
      $mensaje = "<script>
        const instancia = new Mensajes();
        instancia.EliminarEmpleado();
      </script>";
    
      redirigirEliminarEmpleado($mensaje);
    }
    
    if (isset($_POST['valor'])) {
      $newusuario = new EmpleadoDAO();
      $valor = $_POST['valor'];
      $eliminar = $newusuario->eliminar($valor);
    
      if ($eliminar === 1) {
        echo "la conchaklsdfmdskolmfsklx";
    
       $mensaje= "<script>
          const instancia = new Mensajes();
          instancia.EliminacionEmpleadoEfectiva();
        </script>";
    
        redirigirEliminarEmpleado2( $mensaje);       
      }
}





function redirigirRegistrarEmpleado($mensaje)
{
      setcookie("mensaje", $mensaje, time() + 3600, "/"); // Establecer la cookie con el mensaje
      $paginaPrincipal = '../view/RegistrarEmpleadoVista.php'; // Cambia 'index.php' por la URL de tu página principal
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

function redirigirEliminarEmpleado2($mensaje)
{
      setcookie("mensaje", $mensaje, time() + 3600, "/");
      $paginaPrincipal = '../view/MenuEmpleadoVista.php';
      ob_clean(); // Limpiar cualquier salida en búfer
      header("Location: $paginaPrincipal");
      exit();
}


?>
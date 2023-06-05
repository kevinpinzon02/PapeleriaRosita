<?php

//namespace persistence;
require_once('ConexionBD.php');

//use model\EmpleadoDTO;

/**
 * Clase EmpleadoDAO
 *
 * Esta clase se encarga de gestionar la persistencia de los objetos EmpleadoDTO en la base de datos.
 */
class EmpleadoDAO
{
  private $conexion;
  private $empleadodto;

  /**
   * Constructor de la clase EmpleadoDAO.
   *
   * Establece la conexión con la base de datos al crear una instancia de la clase.
   */
  function __construct()
  {

    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
  }

  /**
   * Inserta un nuevo empleado en la base de datos.
   *
   * @param EmpleadoDTO $newempl Objeto EmpleadoDTO a insertar
   * @return int El número que indica el resultado de la operación:
   *             0 - No se pudo realizar la inserción
   *             1 - Inserción exitosa
   *             2 - El empleado ya existe en la base de datos
   *             3 - Error al insertar el teléfono del empleado
   */
  public function insertar($newempl)
  {
    $numero = 0;
    $encontrar = $this->buscar($newempl->getIdentificacion());
    if ($encontrar === false) {


      $sql = "INSERT INTO usuario values (?,?,?,?,?,?,?,?,?)";
      $insert = $this->conexion->prepare($sql);
      $data = array(0, $newempl->getIdentificacion(), $newempl->getTipo(), $newempl->getNombre(), $newempl->getApellido(), $newempl->getRol(), $newempl->getEdad(), $newempl->getEstado(), null);
      if (($inse = $insert->execute($data)) === false) {

        $numero = 3;
      } else {
        $idinsert = $this->conexion->lastInsertId();
        $id2 = $idinsert;

        $sql2 = "INSERT INTO telefono_usuario values (?,?)";
        $insert2 = $this->conexion->prepare($sql2);
        $data2 = array($id2, $newempl->getTelefono());


        $numero = 1;
        if (($inse3 = $insert2->execute($data2)) === false) {
          $numero = 3;
        }
      }
    } else {
      $numero = 2;
    }
    return $numero;
  }

  /**
   * Verifica si un empleado está identificado correctamente en la base de datos.
   *
   * @param int $ide Identificación del empleado
   * @param string $contraseña Contraseña del empleado
   * @return bool Retorna true si el empleado está identificado correctamente, de lo contrario retorna false
   */
  public function identificar($ide, $contraseña)
  {
    try {

      $consult = "SELECT * FROM usuario WHERE identificacion =$ide AND contrasenia ='$contraseña' ";

      $result2 = $this->conexion->query($consult);
      $ersut = $result2->fetchall(PDO::FETCH_ASSOC);
      if (($ersut) != null) {
        return true;
      } else {
        return false;
      }
    } catch (Exception $e) {
      return false;
    }
  }
  /**
   * Asigna una nueva contraseña a un empleado en la base de datos.
   *
   * @param int $ide Identificación del empleado
   * @param string $contraseña Nueva contraseña a asignar
   * @return int El número que indica el resultado de la operación:
   *             0 - No se pudo asignar la contraseña
   *             1 - Contraseña asignada exitosamente
   *             2 - El empleado no existe en la base de datos
   */
  public function asignarContraseña($ide, $contraseña)
  {

    $numero = 0;
    $encontrar = $this->buscar($ide);
    if ($encontrar === true) {

      $consult = "UPDATE usuario SET contrasenia = '$contraseña' WHERE identificacion = $ide";
      $result2 = $this->conexion->query($consult);
      $ersut = $result2->fetchall(PDO::FETCH_ASSOC);
      if (($ersut) != null) {
      } else {
      }

      $numero = 1;
    } else {
      $numero = 2;
    }

    return $numero;
  }
  /**
   * Obtiene el ID de usuario asociado a una identificación de empleado.
   *
   * @param int $ide Identificación del empleado
   * @return int El ID de usuario correspondiente a la identificación del empleado, o 0 si no se encuentra
   */
  public function sacarid($ide)
  {
    try {
      $consult = "SELECT id_usuario FROM usuario WHERE identificacion = :ide ";
      $stmt = $this->conexion->prepare($consult);
      $stmt->bindParam(':ide', $ide);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result !== false) {
        return $result['id_usuario'];
      } else {
        return 0;
      }
    } catch (Exception $e) {
      return 0;
    }
  }

  /**
   * Busca un empleado en la base de datos por su identificación.
   *
   * @param int $ide Identificación del empleado
   * @return bool Retorna true si el empleado existe en la base de datos, de lo contrario retorna false
   */
  public function buscar(int $ide)
  {
    $consult = "SELECT * FROM usuario WHERE identificacion =$ide";
    $result2 = $this->conexion->query($consult);
    $ersut = $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut) != null) {
      return true;
    } else {
      return false;
    }
  }
  /**
   * Elimina un empleado de la base de datos por su identificación.
   *
   * @param int $ide Identificación del empleado
   * @return int El número que indica el resultado de la operación:
   *             1 - Eliminación exitosa
   *             2 - El empleado no existe en la base de datos
   *             3 - Error al eliminar el teléfono del empleado
   */
  public function eliminar(int $ide)
  {
    $encontrar = $this->buscar($ide);

    if ($encontrar === true) {
      $eliminartelefeno = "DELETE FROM telefono_usuario WHERE id_usuario IN (SELECT id_usuario FROM usuario WHERE identificacion = $ide)";
      $elim = $this->conexion->prepare($eliminartelefeno);
      $eli = $elim->execute();

      if ($eli = $elim->execute() === false) {
        return 3;
      } else {

        $eliminarusuario = "DELETE FROM usuario WHERE identificacion = $ide";
        $elim = $this->conexion->prepare($eliminarusuario);
        $eli = $elim->execute();
        return 1;
      }
    } else {
      return 2;
    }
  }
  /**
   * Actualiza los datos de un empleado en la base de datos.
   *
   * @param EmpleadoDTO $empl Objeto EmpleadoDTO con los nuevos datos del empleado
   */
  public function actualizar($empl)
  {
    $sql = "UPDATE usuario SET identificacion = ?, tipo_identificacion = ?, nombre = ?, apellido = ?, rol = ?, edad = ?, estado = ? WHERE identificacion = ?";
    $update = $this->conexion->prepare($sql);
    $data = array(
      $empl->getIdentificacion(),
      $empl->getTipo(),
      $empl->getNombre(),
      $empl->getApellido(),
      $empl->getRol(),
      $empl->getEdad(),
      $empl->getEstado(),
      $empl->getIdentificacion()
    );

    if (($upd = $update->execute($data)) === false) {
      echo "error";
    } else {
      $sql2 = "UPDATE telefono_usuario SET numero_usuario = ? where id_usuario IN (SELECT id_usuario FROM usuario WHERE identificacion = ?)";
      $update2 = $this->conexion->prepare($sql2);
      $data2 = array(
        $empl->getTelefono(),
        $empl->getIdentificacion()
      );
      if (($upd2 = $update2->execute($data2)) === false) {
        echo "hubo un erro";
      }
    }
  }


  /**
   * Obtiene el objeto EmpleadoDTO asociado a la clase EmpleadoDAO.
   *
   * @return mixed El objeto EmpleadoDTO asociado a la clase EmpleadoDAO
   */
  public function getEmpleadodto()
  {
    return $this->empleadodto;
  }
  /**
   * Establece el objeto EmpleadoDTO asociado a la clase EmpleadoDAO.
   *
   * @param mixed $empleadodto El objeto EmpleadoDTO a asociar
   */
  public function setEmpleadodto($empleadodto)
  {
    $this->empleadodto = $empleadodto;
  }
}
?>

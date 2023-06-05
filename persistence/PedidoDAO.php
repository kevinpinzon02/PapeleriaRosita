<?php
/**
 * Este archivo contiene la definición de la clase PedidoDAO.
 * La clase se encarga de realizar operaciones CRUD relacionadas con la tabla "pedido" en la base de datos.
 * Requiere los archivos 'ConexionBD.php', 'PedidoDAO.php' y 'ProveedorDAO.php'.
 */
require_once('ConexionBD.php');
require_once('PedidoDAO.php');
require_once('ProveedorDAO.php');

class PedidoDAO
{
  private $conexion;
 /**
   * Constructor de la clase PedidoDAO.
   * Crea una instancia de la clase Conexion y establece la conexión con la base de datos.
   */
  function __construct()
  {

    $this->conexion = new Conexion();
    $this->conexion  =  $this->conexion->connect();
  }
/**
   * Inserta un nuevo pedido en la base de datos.
   *
   * @param Pedido $newpedid El objeto Pedido a insertar.
   * @return int Retorna un número que indica el resultado de la operación:
   *             - 0 si ocurrió un error al ejecutar la consulta de inserción.
   *             - 1 si la inserción fue exitosa.
   *             - 2 si el pedido ya existe en la base de datos.
   */
  public function insertar($newpedid)
  {
    $numero = 0;
    $newprovedor = new ProveedorDAO();
    $idprov = $newpedid->getIdProveedor();

    $encontrar = $this->buscar($newpedid->getCodigo());
    $encontrarProv = $newprovedor->buscar_id($idprov);

    if ($encontrar === false && $encontrarProv === true) {

      $sql = "INSERT INTO pedido values (?,?,?,?,?,?,?)";
      $insert = $this->conexion->prepare($sql);
      $data = array(0,
        $newpedid->getFechaRealizacion(),
        $newpedid->getFechaEsperada(),
        $newpedid->getDetallePedido(),
        $newpedid->getEstado(),
        $newpedid->getIdProveedor(),
        $newpedid->getCodigo()
      );
      $numero = 1;
      if (($inse = $insert->execute($data)) === false) {

        $numero = 0;
      } 
      
    }else{
      $numero=2;
    }
    return $numero;
  }
/**
   * Busca un pedido en la base de datos por su código.
   *
   * @param string $ide El código del pedido a buscar.
   * @return bool Retorna true si el pedido existe en la base de datos, o false en caso contrario.
   */
  public function buscar(String $ide)
  {
    $consult = "SELECT * FROM pedido WHERE codigo = '$ide'";
    $result2 = $this->conexion->query($consult);
    $ersut = $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut) != null) {
      return true;
    } else {
      return false;
    }
  }
/**
   * Elimina un pedido de la base de datos por su código.
   *
   * @param int $ide El código del pedido a eliminar.
   * @return int Retorna un número que indica el resultado de la operación:
   *             - 0 si ocurrió un error al ejecutar la consulta de eliminación.
   *             - 1 si la eliminación fue exitosa.
   *             - 2 si el pedido no existe en la base de datos.
   */
  public function eliminar(int $ide)
  {
    $number=0;
    $encontrar = $this->buscar($ide);

    if ($encontrar === true) {
    $eliminarpedido = "DELETE FROM pedido WHERE codigo = '$ide'";
    $elim = $this->conexion->prepare($eliminarpedido);
    $eli = $elim->execute();
    $number = 1;
    echo "se borro";
    
    } else {
      $number = 2;
    }
    return $number;
  }

/**
   * Actualiza los datos de un pedido en la base de datos.
   *
   * @param Pedido $empl El objeto Pedido con los nuevos datos a actualizar.
   */
  public function actualizar($empl)
  {
    $sql = "UPDATE pedido SET fecha_realizada = ?, fecha_esperada = ?, detalle_pedido = ?, estado = ? WHERE codigo = ?";
    $update = $this->conexion->prepare($sql);
    $data = array(
      $empl->getFechaRealizacion(),
      $empl->getFechaEsperada(),
      $empl->getDetallePedido(),
      $empl->getEstado(),
      $empl->getCodigo()
    );

    if (($upd = $update->execute($data)) === false) {
      echo "error";
    } else {
      echo "final feliz";
    }
  }
}

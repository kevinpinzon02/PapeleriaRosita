<?php
require_once('ConexionBD.php');
require_once('ProductoDAO.php');

/**
 * Clase CompraDAO
 *
 * Esta clase proporciona métodos para interactuar con la tabla "compra" en la base de datos.
 */
class CompraDAO
{
  /**
   * @var object Instancia de la clase Conexion para manejar la conexión a la base de datos.
   */
  private $conexion;
  /**
   * @var object Instancia de la clase VentaDTO para manejar los datos de la venta.
   */
  private $ventadto;

  /**
   * Constructor de la clase CompraDAO.
   * Establece la conexión a la base de datos al instanciar el objeto.
   */
  function __construct()
  {

    $this->conexion = new Conexion();
    $this->conexion  =  $this->conexion->connect();
  }

  /**
   * Inserta una nueva compra en la base de datos.
   *
   * @param object $newventa Instancia de VentaDTO con los datos de la compra a insertar.
   * @return int Retorna un código de estado: 1 si se insertó correctamente, 2 si la compra ya existe, 3 si ocurrió un error.
   */
  public function insertar($newventa)
  {

    $encontrar = $this->buscar($newventa->getCodigo());
    if ($encontrar === false) {
      $sql = "INSERT INTO compra values (?,?,?,?,?,?,?,?)";
      $insert = $this->conexion->prepare($sql);
      $data = array(
        0,
        $newventa->getValorCompra(),
        $newventa->getFechaCompra(),
        $newventa->getDetalleCompra(),
        $newventa->getEstado(),
        $newventa->getIdPedido(),
        $newventa->getIdUsuario(),
        $newventa->getCodigo()
      );

      $idinsert = $this->conexion->lastInsertId();
      $id2 = $idinsert;
      //echo " este es el usuario: ".$newventa ->getUsuario();
      if (($inse = $insert->execute($data)) === false) {
        echo "no se logor insertar";
        return 3;
      } else {
        $idinsert = $this->conexion->lastInsertId();
        $id2 = $idinsert;
        $this->actualizarproducto($newventa->getListaProducto(), $id2);
      }
    } else {
      echo "no se pudo";
    }
  }
  /**
   * Actualiza los productos relacionados con una compra en la base de datos.
   *
   * @param array $listaproductos Lista de productos a actualizar.
   * @param int $codigo Código de la compra.
   */
  public function actualizarproducto($listaproductos, $codigo)
  {
    foreach ($listaproductos as $producto) {

      $id_producto = $producto['id_producto'];
      $cantidad = $producto['cantidad'];
      echo "Nombre: " . $id_producto . ", Edad: " . $cantidad . "<br>";
      $sql = "INSERT INTO compra_producto values (?,?,?)";
      $insert = $this->conexion->prepare($sql);
      $data = array(
        $codigo,
        $id_producto,
        $cantidad
      );
      if (!$insert->execute($data)) {
        echo "Error al insertar en la tabla venta_producto.";
        return;
      }
    }
  }



  /**
   * Busca una compra en la base de datos por su código.
   *
   * @param int $ide Código de la compra a buscar.
   * @return bool Retorna true si se encontró la compra, o false si no se encontró.
   */
  public function buscar($ide)
  {
    $consult = "SELECT * FROM compra WHERE codigo = '$ide'";
    $result2 = $this->conexion->query($consult);
    $ersut = $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut) != null) {
      return true;
    } else {
      return false;
    }
  }
  /**
   * Elimina una compra de la base de datos por su código.
   *
   * @param int $ide Código de la compra a eliminar.
   * @return int Retorna un código de estado: 0 si la compra no se encontró, 1 si se eliminó correctamente, 2 si ocurrió un error.
   */
  public function eliminar($ide)
  {
    $encontrar = $this->buscar($ide);
    $encontrar = $this->buscar($ide);


    public function eliminar($ide) {
     
}

public function actualizar($newproc) {


}



public function getEmpleadodto() {
  return $this->empleadodto;
}

public function setEmpleadodto($empleadodto) {
  $this->empleadodto = $empleadodto;
}



}
?>
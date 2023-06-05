<?php

require_once('ConexionBD.php');
require_once('PedidoDAO.php');
require_once('ProveedorDAO.php');

class PedidoDAO
{
  private $conexion;

  function __construct()
  {

    $this->conexion = new Conexion();
    $this->conexion  =  $this->conexion->connect();
  }

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

  public function eliminar(int $ide)
  {
    $encontrar = $this->buscar($ide);

    $eliminarpedido = "DELETE FROM pedido WHERE id_pedido = $ide";
    $elim = $this->conexion->prepare($eliminarpedido);
    $eli = $elim->execute();

    echo "se borro";
  }


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

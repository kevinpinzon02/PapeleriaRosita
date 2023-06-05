<?php
 //namespace persistence;

require_once('ConexionBD.php');
  
//use model\EmpleadoDTO;


class ProductoDAO {
    private $conexion;
    private $prodcutodto;

function __construct() {
     
     $this->conexion =new Conexion();
     $this->conexion  =  $this->conexion ->connect();
    
  }
   public function insertar($newproc)
  {
    $numero = 0;

    $encontrar = $this->buscar($newproc ->getNombreProducto());
    if($encontrar===false){

          
      $sql= "INSERT INTO producto values (?,?,?,?,?,?,?,?)";
      $insert=$this->conexion->prepare($sql);
      $data= array(0,$newproc ->getNombreProducto(), 
      $newproc ->getValorCompra(),
      $newproc ->getValorVenta(),
      $newproc ->getCantidad(),
      $newproc ->getDetalleProducto(),
      $newproc ->getEstado(),
      $newproc ->getCodigo()
    );
      $numero = 1;
      if (($inse= $insert ->execute($data)) ===false){
          
        $numero = 0;
      }
    }else{
      $numero=2;
    }
    return $numero;
    }



  public function buscar ($ide){
    $consult= "SELECT * FROM producto WHERE nombre_producto = '$ide'";
    $result2 =$this->conexion->query($consult);
    $ersut= $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut)!=null){
      return true;
    }else {
      return false;
    }

  }

    public function eliminar($ide) {
      $encontrar = $this->buscar($ide);
      $encontrar = $this->buscar($ide);

      if($encontrar===true){
      $eliminarproducto = "DELETE FROM producto WHERE nombre_producto = '$ide'";
      $elim = $this->conexion->prepare($eliminarproducto);
      $eli = $elim->execute();

      if($eli = $elim->execute()===false){
      echo "no se borro";
      return 0;
  }else {
    echo "se borro";
    return 1;

  }
}else{
  echo "no se encontro el producto";
  return 2;

}
}

public function actualizar($newproc) {
  $sql = "UPDATE producto SET nombre_producto = ?, valor_compra = ?, valor_venta = ?, cantidad = ?, detalle_producto = ?, estado = ? WHERE codigo = ?";
  $update = $this->conexion->prepare($sql);
  
  $data= array($newproc ->getNombreProducto(), 
  $newproc ->getValorCompra(),
  $newproc ->getValorVenta(),
  $newproc ->getCantidad(),
  $newproc ->getDetalleProducto(),
  $newproc ->getEstado(),
  $newproc ->getCodigo());

  echo  $sql;

  if (($upd = $update->execute($data)) === false) {
      echo "no se pudo actualizar";
  }else{

    echo "se actualizo";
     
  }

}



public function getEmpleadodto() {
  return $this->empleadodto;
}

public function setEmpleadodto($empleadodto) {
  $this->empleadodto = $empleadodto;
}


}
  ?>
<?php
 //namespace persistence;

require_once('ConexionBD.php');
  
//use model\EmpleadoDTO;


class ProductoDAO {
    private $conexion;
    private $empleadodto;

function __construct() {
     
     $this->conexion =new Conexion();
     $this->conexion  =  $this->conexion ->connect();
     $this->prodcutodto = new ProductoDTO(null,null,null,null,null,null);

  }


   public function insertar($newproc)
  {

    $encontrar = $this->buscar($newproc ->getNombreProducto());
    if($encontrar===false){

          
      $sql= "INSERT INTO producto values (?,?,?,?,?,?,?)";
      $insert=$this->conexion->prepare($sql);
      $data= array(0,$newproc ->getNombreProducto(), 
      $newproc ->getValorCompra(),
      $newproc ->getValorVenta(),
      $newproc ->getCantidad(),
      $newproc ->getDetalleProducto(),
      $newproc ->getEstado());
      if (($inse= $insert ->execute($data)) ===false){
          
        return 3;
      }else {
        echo "no se pudo";
      }

    }
    
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

public function actualizar($empl) {
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
  }else{
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



public function getEmpleadodto() {
  return $this->empleadodto;
}

public function setEmpleadodto($empleadodto) {
  $this->empleadodto = $empleadodto;
}


}
  ?>
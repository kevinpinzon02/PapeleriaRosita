<?php

require_once('ConexionBD.php');
require_once('ProveedorDAO.php');

class ProveedorDAO {
    private $conexion;

function __construct() {
     
     $this->conexion =new Conexion();
     $this->conexion  =  $this->conexion ->connect() ;

  }


   public function insertar($newempl)
  {

    $encontrar = $this->buscar($newempl ->getNit());
    if($encontrar===false){

          
      $sql= "INSERT INTO proveedor values (?,?,?,?,?,?)";
      $insert=$this->conexion->prepare($sql);
      $data= array(0,
      $newempl ->getNombre(), 
      $newempl ->getDireccion(), 
      $newempl ->getNit(), 
      $newempl ->getAsesor(),
      $newempl ->getEstado());
      if (($inse= $insert ->execute($data)) ===false){
          
        return 0;
      }else{
        $idinsert = $this->conexion -> lastInsertId();
        $id2= $idinsert;
        echo  "insertar despues: ".$id2 ." depues de la insert";
        $sql2= "INSERT INTO telefono_proveedor values (?,?)";
        $insert2=$this->conexion->prepare($sql2);
        $data2= array($id2, $newempl ->getTelefono());

        if (($inse3= $insert2 ->execute($data2)) ===false){
          return 0;
        }

        
      }

  }else{

    echo "ya esta el registro";
  }
  return 1;

  }


  public function buscar (String $ide){
    $consult= "SELECT * FROM proveedor WHERE nit = '$ide'";
    $result2 =$this->conexion->query($consult);
    $ersut= $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut)!=null){
      return true;
}else {
  return false;
}

  }

  public function buscar_id (INT $ide){
    $consult= "SELECT * FROM proveedor WHERE id_proveedor = $ide";
    $result2 =$this->conexion->query($consult);
    $ersut= $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut)!=null){
      return true;
}else {
  return false;
}

  }
    public function eliminar(int $ide) {
      $encontrar = $this->buscar($ide);

      if($encontrar===true){
      $eliminartelefeno = "DELETE FROM telefono_usuario WHERE id_usuario IN (SELECT id_usuario FROM usuario WHERE identificacion = $ide)";
      $elim = $this->conexion->prepare($eliminartelefeno);
      $eli = $elim->execute();

      if($eli = $elim->execute()===false){
      echo "no se borro";
  }else {

    $eliminartelefeno = "DELETE FROM usuario WHERE identificacion = $ide";
      $elim = $this->conexion->prepare($eliminartelefeno);
      $eli = $elim->execute();

  }
}else{
  echo "no se borro";

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



}
  ?>
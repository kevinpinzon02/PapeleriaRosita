<?php

require_once('ConexionBD.php');
require_once('EmpleadoDTO.php');

class EmpleadoDAO {
    private $conexion;

function __construct() {
     
     $this->conexion =new Conexion();
     $this->conexion  =  $this->conexion ->connect() ;

  }


   public function insertar($newempl)
  {

    $encontrar = $this->buscar($newempl ->getIdentificacion(), $newempl ->getTipo());
    if($encontrar===false){

          
      $sql= "INSERT INTO usuario values (?,?,?,?,?,?,?,?)";
      $insert=$this->conexion->prepare($sql);
      $data= array(0,$newempl ->getIdentificacion(), $newempl ->getTipo(),$newempl ->getNombre(), $newempl ->getApellido(), $newempl ->getRol(), $newempl ->getEdad(), $newempl ->getEstado());
      if (($inse= $insert ->execute($data)) ===false){
          
        return 0;
      }else{
        $idinsert = $this->conexion -> lastInsertId();
        $id2= $idinsert;
        echo  "insertar despues: ".$id2 ." depues de la insert";
        $sql2= "INSERT INTO telefono_usuario values (?,?)";
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
/*
    public function insertar2(int $ide ,int $tip,string $nom,string $ape, string $roll,int $eda,string $esta,string $cel)
  {
    include('conexion.php');
    
    $id =0;

    $encontrar = $this->buscar($ide,$tip);
    if($encontrar===false){
    $newempl= new EmpleadoDTO($ide,$tip,$nom,$ape,$roll,$eda,$esta,$cel);
  $insertSQL= "INSERT  INTO  usuario VALUES (NULL,".$newempl ->getIdentificacion().",".$newempl ->getTipo().",'".$newempl ->getNombre()."','".$newempl ->getApellido()."','".$newempl ->getRol()."',".$newempl ->getEdad().",'".$newempl ->getEstado()."')";
  echo $insertSQL;
  if (($result = mysqli_query($mysqli,$insertSQL)) === false) {
  echo "<br><center><li>Se encontro un erro verifica el archivo</center>";
  echo "<br><center><li><a href='RegistrarEmpleadoVista.php'>VOLVER A OPCIONES</a></center>";
exit();
}else{
    $consult= "SELECT id_usuario FROM usuario WHERE identificacion =".$newempl ->getIdentificacion();
    $result2 = mysqli_query($mysqli,$consult);
    $fila = mysqli_fetch_array($result2);
    $insertSQL2= "INSERT  INTO  telefono_usuario VALUES (".$fila[0].",'".$newempl ->getTelefono()."')";
    if (($result3 = mysqli_query($mysqli,$insertSQL2)) === false){

            echo "<br><center><li>no se inserto el telefono </center>";
                
            echo "<br><center><li><a href='index.php'>VOLVER A OPCIONES</a></center>";
          exit();
    }else{  
      echo "LOGRO";
}
   }
  }else{
    echo "ya esta el registro";
  }

  }
  */

  public function buscar (int $ide){
    $consult= "SELECT * FROM usuario WHERE identificacion =$ide";
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
}
  ?>
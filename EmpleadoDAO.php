<?php

require_once('ConexionBD.php');
require_once('EmpleadoDTO.php');

class EmpleadoDAO {
    private $conexion;

function __construct() {
     
     $this->conexion =new Conexion();
     $this->conexion  =  $this->conexion ->connect() ;
  }


   public function insertar(int $ide ,int $tip,string $nom,string $ape, string $roll,int $eda,string $esta,string $cel)
  {
    $id =0;

    $encontrar = $this->buscar($ide,$tip);
    if($encontrar===false){
      $newempl= new EmpleadoDTO($ide,$tip,$nom,$ape,$roll,$eda,$esta,$cel);

          
      $sql= "INSERT INTO usuario values (?,?,?,?,?,?,?,?)";
      $insert=$this->conexion->prepare($sql);
      $data= array($id,$newempl ->getIdentificacion(), $newempl ->getTipo(),$newempl ->getNombre(), $newempl ->getApellido(), $newempl ->getRol(), $newempl ->getEdad(), $newempl ->getEstado());
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
   return $ide;

  }
  

  public function buscar (int $ide,int $tip){
    $consult= "SELECT * FROM usuario WHERE identificacion =$ide and tipo_identificacion=$tip";
    $result2 =$this->conexion->query($consult);
    $ersut= $result2->fetchall(PDO::FETCH_ASSOC);
    if (($ersut)!=null){
      return true;
}else {
  return false;
}

  }

  public function eliminar (int $ide,int $tip){
    $consult= "DELETE usuario WHERE identificacion = $ide";
    $result2 = mysqli_query($this->conexion,$consult);
    $fila = mysqli_fetch_array($result2);
    $insertSQL2= "DELETE  telefono_usuario WHERE id_usuario = $fila[0]";
    

  }
}
  ?>
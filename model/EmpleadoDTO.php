<?php

/**
 * Clase EmpleadoDTO
 *
 * Esta clase representa un objeto Empleado con atributos y métodos relacionados.
 */
class EmpleadoDTO
{

  /**
   * @var string Identificación del empleado
   * @access private
   */
  private $IDENTIFICACION;

  /**
   * @var string Tipo de empleado
   * @access private
   */
  private $tipo;

  /**
   * @var string Nombre del empleado
   * @access private
   */
  private $nombre;

  /**
   * @var string Apellido del empleado
   * @access private
   */
  private $apellido;

  /**
   * @var int Edad del empleado
   * @access private
   */
  private $edad;

  /**
   * @var string Rol del empleado
   * @access private
   */
  private $rol;

  /**
   * @var string Teléfono del empleado
   * @access private
   */
  private $telefono;

  /**
   * @var string Estado del empleado
   * @access private
   */
  private $estado;

  /**
   * @var object Conexión a la base de datos (debe ser establecida externamente)
   * @access private
   */
  private $conexion;

  /**
   * Constructor de la clase EmpleadoDTO.
   *
   * @param string $IDENTIFICACION Identificación del empleado
   * @param string $tipo Tipo de empleado
   * @param string $nombre Nombre del empleado
   * @param string $apellido Apellido del empleado
   * @param string $rol Rol del empleado
   * @param int $edad Edad del empleado
   * @param string $estado Estado del empleado
   * @param string $telefono Teléfono del empleado
   */
  function __construct($IDENTIFICACION, $tipo, $nombre, $apellido, $rol, $edad, $estado, $telefono)
  {
    $this->IDENTIFICACION = $IDENTIFICACION;
    $this->tipo = $tipo;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->rol = $rol;
    $this->edad = $edad;
    $this->estado = $estado;
    $this->telefono = $telefono;
  }


  /**
   * Obtiene la identificación del empleado.
   *
   * @return string Identificación del empleado
   */
  public function getIdentificacion()
  {
    return $this->IDENTIFICACION;
  }

  /**
   * Establece la identificación del empleado.
   *
   * @param string $identificacion Identificación del empleado
   */
  public function setIdentificacion($identificacion)
  {
    $this->IDENTIFICACION = $identificacion;
  }


  /**
   * Obtiene el tipo de empleado.
   *
   * @return string Tipo de empleado
   */
  public function getTipo()
  {
    return $this->tipo;
  }


  /**
   * Establece el tipo de empleado.
   *
   * @param string $tipo Tipo de empleado
   */
  public function setTipo($tipo)
  {
    $this->tipo = $tipo;
  }


  /**
   * Obtiene el nombre del empleado.
   *
   * @return string Nombre del empleado
   */
  public function getNombre()
  {
    return $this->nombre;
  }


  /**
   * Establece el nombre del empleado.
   *
   * @param string $nombre Nombre del empleado
   */
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }


  /**
   * Obtiene el apellido del empleado.
   *
   * @return string Apellido del empleado
   */
  public function getApellido()
  {
    return $this->apellido;
  }


  /**
   * Establece el apellido del empleado.
   *
   * @param string $apellido Apellido del empleado
   */
  public function setApellido($apellido)
  {
    $this->apellido = $apellido;
  }


  /**
   * Obtiene la edad del empleado.
   *
   * @return int Edad del empleado
   */
  public function getEdad()
  {
    return $this->edad;
  }

  /**
   * Establece la edad del empleado.
   *
   * @param int $edad Edad del empleado
   */
  public function setEdad($edad)
  {
    $this->edad = $edad;
  }

  /**
   * Obtiene el rol del empleado.
   *
   * @return string Rol del empleado
   */
  public function getRol()
  {
    return $this->rol;
  }

  /**
   * Establece el rol del empleado.
   *
   * @param string $rol Rol del empleado
   */
  public function setRol($rol)
  {
    $this->rol = $rol;
  }


  /**
   * Obtiene el teléfono del empleado.
   *
   * @return string Teléfono del empleado
   */
  public function getTelefono()
  {
    return $this->telefono;
  }

  /**
   * Establece el teléfono del empleado.
   *
   * @param string $telefono Teléfono del empleado
   */
  public function setTelefono($telefono)
  {
    $this->telefono = $telefono;
  }

  /**
   * Obtiene el estado del empleado.
   *
   * @return string Estado del empleado
   */
  public function getEstado()
  {
    return $this->estado;
  }

  /**
   * Establece el estado del empleado.
   *
   * @param string $estado Estado del empleado
   */
  public function setEstado($estado)
  {
    $this->estado = $estado;
  }
}

?>
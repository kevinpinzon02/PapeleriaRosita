<?php


class EmpleadoDTO{

        private $IDENTIFICACION;
        private $tipo;
        private $nombre;
        private $apellido;
        private $edad;
        private $rol;
        private $telefono;
        private $estado;
        private $conexion;

     
         function __construct($IDENTIFICACION, $tipo, $nombre,$apellido,$rol,$edad,$estado,$telefono)
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

        public function getIdentificacion() {
                return $this->IDENTIFICACION;
              }
              
              public function setIdentificacion($identificacion) {
                $this->IDENTIFICACION = $identificacion;
              }
              
              public function getTipo() {
                return $this->tipo;
              }
              
              public function setTipo($tipo) {
                $this->tipo = $tipo;
              }
              
              public function getNombre() {
                return $this->nombre;
              }
              
              public function setNombre($nombre) {
                $this->nombre = $nombre;
              }
              
              public function getApellido() {
                return $this->apellido;
              }
              
              public function setApellido($apellido) {
                $this->apellido = $apellido;
              }
              
              public function getEdad() {
                return $this->edad;
              }
              
              public function setEdad($edad) {
                $this->edad = $edad;
              }
          
              
              public function getRol() {
                return $this->rol;
              }
              
              public function setRol($rol) {
                $this->rol = $rol;
              }
              
              public function getTelefono() {
                return $this->telefono;
              }
              
              public function setTelefono($telefono) {
                $this->telefono = $telefono;
              }
              
              public function getEstado() {
                return $this->estado;
              }
              
              public function setEstado($estado) {
                $this->estado = $estado;
              }
            
}

?>

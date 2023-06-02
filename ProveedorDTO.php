<?php

class ProveedorDTO {
    private $nombre;
    private $telefono;
    private $direccion;
    private $nit;
    private $asesor;
    private $estado;

    public function __construct($nombre, $telefono, $direccion, $nit, $asesor, $estado) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->nit = $nit;
        $this->asesor = $asesor;
        $this->estado = $estado;
    }
//
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
//
    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
//
    public function getDireccion() {
        return $this->direccion;
    }
    
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
//
    public function getNit() {
        return $this->nit;
    }

    public function setNit($nit) {
        $this->nit = $nit;
    }
//
    public function getAsesor() {
        return $this->asesor;
    }

    public function setAsesor($asesor) {
        $this->asesor = $asesor;
    }
//
    public function getEstado() {
        return $this->estado;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>
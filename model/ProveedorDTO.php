<?php

/**
 * Clase ProveedorDTO
 *
 * Esta clase representa un proveedor con sus atributos correspondientes.
 */
class ProveedorDTO {
    /**
     * Nombre del proveedor.
     *
     * @var string
     * @access private
     */
    private $nombre;
    /**
     * Teléfono del proveedor.
     *
     * @var string
     * @access private
     */
    private $telefono;
    /**
     * Dirección del proveedor.
     *
     * @var string
     * @access private
     */
    private $direccion;
    /**
     * NIT (Número de Identificación Tributaria) del proveedor.
     *
     * @var string
     * @access private
     */
    private $nit;
    /**
     * Asesor asignado al proveedor.
     *
     * @var string
     * @access private
     */
    private $asesor;
    /**
     * Estado del proveedor.
     *
     * @var string
     * @access private
     */
    private $estado;

    /**
     * Constructor de la clase ProveedorDTO.
     *
     * @param string $nombre Nombre del proveedor
     * @param string $telefono Teléfono del proveedor
     * @param string $direccion Dirección del proveedor
     * @param string $nit NIT (Número de Identificación Tributaria) del proveedor
     * @param string $asesor Asesor asignado al proveedor
     * @param string $estado Estado del proveedor
     */
    public function __construct($nombre, $telefono, $direccion, $nit, $asesor, $estado) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->nit = $nit;
        $this->asesor = $asesor;
        $this->estado = $estado;
    }
//

/**
     * Obtiene el nombre del proveedor.
     *
     * @return string Nombre del proveedor
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Establece el nombre del proveedor.
     *
     * @param string $nombre Nombre del proveedor
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
//
/**
     * Obtiene el teléfono del proveedor.
     *
     * @return string Teléfono del proveedor
     */
    public function getTelefono() {
        return $this->telefono;
    }

    /**
     * Establece el teléfono del proveedor.
     *
     * @param string $telefono Teléfono del proveedor
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
//
/**
     * Obtiene la dirección del proveedor.
     *
     * @return string Dirección del proveedor
     */
    public function getDireccion() {
        return $this->direccion;
    }
    
    /**
     * Establece la dirección del proveedor.
     *
     * @param string $direccion Dirección del proveedor
     */
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
//

/**
     * Obtiene el NIT del proveedor.
     *
     * @return string NIT del proveedor
     */
    public function getNit() {
        return $this->nit;
    }

    /**
     * Establece el NIT del proveedor.
     *
     * @param string $nit NIT del proveedor
     */
    public function setNit($nit) {
        $this->nit = $nit;
    }
//
/**
     * Obtiene el asesor asignado al proveedor.
     *
     * @return string Asesor asignado al proveedor
     */
    public function getAsesor() {
        return $this->asesor;
    }

    /**
     * Establece el asesor asignado al proveedor.
     *
     * @param string $asesor Asesor asignado al proveedor
     */
    public function setAsesor($asesor) {
        $this->asesor = $asesor;
    }
//
/**
     * Obtiene el estado del proveedor.
     *
     * @return string Estado del proveedor
     */
    public function getEstado() {
        return $this->estado;
    }
    
    /**
     * Establece el estado del proveedor.
     *
     * @param string $estado Estado del proveedor
     */
    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>
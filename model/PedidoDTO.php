<?php

/**
 * Clase PedidoDTO
 *
 * Esta clase representa un objeto PedidoDTO que contiene información sobre un pedido.
 */
class PedidoDTO
{
    /**
     * Código del pedido.
     *
     * @var string
     * @access private
     */
    private $codigo;
    /**
     * Fecha de realización del pedido.
     *
     * @var string
     * @access private
     */
    private $fechaRealizacion;
    /**
     * Fecha esperada para la entrega del pedido.
     *
     * @var string
     * @access private
     */
    private $fechaEsperada;
    /**
     * Detalle del pedido.
     *
     * @var string
     * @access private
     */
    private $detallePedido;
    /**
     * Estado del pedido.
     *
     * @var string
     * @access private
     */
    private $estado;
    /**
     * ID del proveedor asociado al pedido.
     *
     * @var int
     * @access private
     */
    private $id_proveedor;


    /**
     * Constructor de la clase PedidoDTO.
     *
     * @param string $codigo Código del pedido
     * @param string $fechaRealizacion Fecha de realización del pedido
     * @param string $fechaEsperada Fecha esperada para la entrega del pedido
     * @param string $detallePedido Detalle del pedido
     * @param string $estado Estado del pedido
     * @param int $id_proveedor ID del proveedor asociado al pedido
     */
    public function __construct($codigo, $fechaRealizacion, $fechaEsperada, $detallePedido, $estado, $id_proveedor)
    {
        $this->codigo = $codigo;
        $this->fechaRealizacion = $fechaRealizacion;
        $this->fechaEsperada = $fechaEsperada;
        $this->detallePedido = $detallePedido;
        $this->estado = $estado;
        $this->id_proveedor = $id_proveedor;
    }
    //
    /**
     * Obtiene el código del pedido.
     *
     * @return string Código del pedido
     */
    public function getCodigo()
    {
        return $this->codigo;
    }
    /**
     * Establece el código del pedido.
     *
     * @param string $codigo Código del pedido
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    //   
    /**
     * Obtiene la fecha de realización del pedido.
     *
     * @return string Fecha de realización del pedido
     */
    public function getFechaRealizacion()
    {
        return $this->fechaRealizacion;
    }
    /**
     * Establece la fecha de realización del pedido.
     *
     * @param string $fechaRealizacion Fecha de realización del pedido
     */
    public function setFechaRealizacion($fechaRealizacion)
    {
        $this->fechaRealizacion = $fechaRealizacion;
    }
    //    
    /**
     * Obtiene la fecha esperada para la entrega del pedido.
     *
     * @return string Fecha esperada para la entrega del pedido
     */
    public function getFechaEsperada()
    {
        return $this->fechaEsperada;
    }
    /**
     * Establece la fecha esperada para la entrega del pedido.
     *
     * @param string $fechaEsperada Fecha esperada para la entrega del pedido
     */
    public function setFechaEsperada($fechaEsperada)
    {
        $this->fechaEsperada = $fechaEsperada;
    }
    //    
    /**
     * Obtiene el ID del proveedor asociado al pedido.
     *
     * @return int ID del proveedor asociado al pedido
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }
    /**
     * Establece el ID del proveedor asociado al pedido.
     *
     * @param int $id_proveedor ID del proveedor asociado al pedido
     */
    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
    }
    //
    /**
     * Obtiene el detalle del pedido.
     *
     * @return string Detalle del pedido
     */
    public function getDetallePedido()
    {
        return $this->detallePedido;
    }

    /**
     * Establece el detalle del pedido.
     *
     * @param string $detallePedido Detalle del pedido
     */
    public function setDetallePedido($detallePedido)
    {
        $this->detallePedido = $detallePedido;
    }
    //
    /**
     * Obtiene el estado del pedido.
     *
     * @return string Estado del pedido
     */
    public function getEstado()
    {
        return $this->estado;
    }
    /**
     * Establece el estado del pedido.
     *
     * @param string $estado Estado del pedido
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}
?>
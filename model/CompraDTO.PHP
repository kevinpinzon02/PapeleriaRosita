<?php

/**
 * Clase CompraDTO
 *
 * Esta clase representa un objeto de transferencia de datos (DTO) para una compra.
 */
class CompraDTO
{

    /**
     * Valor de la compra.
     *
     * @var float
     */
    private $valorCompra;
    /**
     * Fecha de la compra.
     *
     * @var string
     */
    private $fechaCompra;
    /**
     * ID del pedido asociado a la compra.
     *
     * @var int
     */
    private $id_pedido;
    /**
     * Detalle de la compra.
     *
     * @var string
     */
    private $detalleCompra;
    /**
     * Estado de la compra.
     *
     * @var string
     */
    private $estado;
    /**
     * ID del usuario asociado a la compra.
     *
     * @var int
     */
    private $id_usuario;
    /**
     * Código de la compra.
     *
     * @var string
     */

    private $codigo;
    /**
     * Lista de productos asociados a la compra.
     *
     * @var array
     */
    private $listaproducto;


    /**
     * Constructor de la clase CompraDTO.
     *
     * @param float $valorCompra Valor de la compra
     * @param string $fechaCompra Fecha de la compra
     * @param int $id_pedido ID del pedido asociado a la compra
     * @param string $detalleCompra Detalle de la compra
     * @param string $estado Estado de la compra
     * @param int $id_usuario ID del usuario asociado a la compra
     * @param string $codigo Código de la compra
     * @param array $listaproducto Lista de productos asociados a la compra
     */
    function __construct($valorCompra, $fechaCompra, $id_pedido, $detalleCompra, $estado, $id_usuario, $codigo, $listaproducto)
    {
        $this->valorCompra = $valorCompra;
        $this->fechaCompra = $fechaCompra;
        $this->id_pedido = $id_pedido;
        $this->detalleCompra = $detalleCompra;
        $this->id_usuario = $id_usuario;
        $this->estado = $estado;
        $this->codigo = $codigo;
        $this->listaproducto = $listaproducto;
    }
    //
    /**
     * Obtiene el valor de la compra.
     *
     * @return float Valor de la compra
     */
    public function getValorCompra()
    {
        return $this->valorCompra;
    }

    /**
     * Establece el valor de la compra.
     *
     * @param float $valorCompra Valor de la compra
     */
    public function setValorCompra($valorCompra)
    {
        $this->valorCompra = $valorCompra;
    }
    //
    /**
     * Obtiene la fecha de la compra.
     *
     * @return string Fecha de la compra
     */
    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }

    /**
     * Establece la fecha de la compra.
     *
     * @param string $fechaCompra Fecha de la compra
     */
    public function setFechaCompra($fechaCompra)
    {
        $this->fechaCompra = $fechaCompra;
    }
    //

    /**
     * Obtiene el ID del pedido asociado a la compra.
     *
     * @return int ID del pedido asociado a la compra
     */
    public function getIdPedido()
    {
        return $this->id_pedido;
    }

    /**
     * Establece el ID del pedido asociado a la compra.
     *
     * @param int $id_pedido ID del pedido asociado a la compra
     */
    public function setIdPedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;
    }

    //

    /**
     * Obtiene el detalle de la compra.
     *
     * @return string Detalle de la compra
     */
    public function getDetalleCompra()
    {
        return $this->detalleCompra;
    }

    /**
     * Establece el detalle de la compra.
     *
     * @param string $detalleCompra Detalle de la compra
     */
    public function setDetalleCompra($detalleCompra)
    {
        $this->detalleCompra = $detalleCompra;
    }
    //

    /**
     * Obtiene el estado de la compra.
     *
     * @return string Estado de la compra
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Establece el estado de la compra.
     *
     * @param string $estado Estado de la compra
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    //
    /**
     * Obtiene el ID del usuario asociado a la compra.
     *
     * @return int ID del usuario asociado a la compra
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }


    /**
     * Establece el ID del usuario asociado a la compra.
     *
     * @param int $id_usuario ID del usuario asociado a la compra
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }


    /**
     * Obtiene el código de la compra.
     *
     * @return string Código de la compra
     */
    public function getCodigo()
    {
        return $this->codigo;
    }


    /**
     * Establece el código de la compra.
     *
     * @param string $codigo Código de la compra
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * Obtiene la lista de productos asociados a la compra.
     *
     * @return array Lista de productos asociados a la compra
     */
    public function getListaProducto()
    {
        return $this->listaproducto;
    }

    /**
     * Establece la lista de productos asociados a la compra.
     *
     * @param array $listaproducto Lista de productos asociados a la compra
     */
    public function setListaProducto($listaproducto)
    {
        $this->listaproducto = $listaproducto;
    }
}
?>
<?php

/**
 * Clase ProductoDTO
 *
 * Esta clase representa un Producto con sus atributos y métodos relacionados.
 */
class ProductoDTO
{
    /**
     * @var string El nombre del producto.
     * @access private
     */
    private $nombreProducto;
    /**
     * @var float El valor de compra del producto.
     * @access private
     */
    private $valorCompra;
    /**
     * @var float El valor de venta del producto.
     * @access private
     */
    private $valorVenta;
    /**
     * @var int La cantidad disponible del producto.
     * @access private
     */
    private $cantidad;
    /**
     * @var string El detalle del producto.
     * @access private
     */
    private $detalleProducto;
    /**
     * @var string El estado del producto.
     * @access private
     */
    private $estado;
    /**
     * @var string El código del producto.
     * @access private
     */
    private $codgio;


    /**
     * Constructor de la clase ProductoDTO.
     *
     * @param string $nombreProducto El nombre del producto.
     * @param float $valorCompra El valor de compra del producto.
     * @param float $valorVenta El valor de venta del producto.
     * @param int $cantidad La cantidad disponible del producto.
     * @param string $detalleProducto El detalle del producto.
     * @param string $estado El estado del producto.
     * @param string $codigo El código del producto.
     */
    public function __construct($nombreProducto, $valorCompra, $valorVenta, $cantidad, $detalleProducto, $estado, $codgio)
    {

        $this->nombreProducto = $nombreProducto;
        $this->valorCompra = $valorCompra;
        $this->valorVenta = $valorVenta;
        $this->cantidad = $cantidad;
        $this->detalleProducto = $detalleProducto;
        $this->estado = $estado;
        $this->codgio = $codgio;
    }
    //

    /**
     * Obtiene el nombre del producto.
     *
     * @return string El nombre del producto.
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Establece el nombre del producto.
     *
     * @param string $nombreProducto El nombre del producto.
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    }
    //

    /**
     * Obtiene el valor de compra del producto.
     *
     * @return float El valor de compra del producto.
     */
    public function getValorCompra()
    {
        return $this->valorCompra;
    }

    /**
     * Establece el valor de compra del producto.
     *
     * @param float $valorCompra El valor de compra del producto.
     */
    public function setValorCompra($valorCompra)
    {
        $this->valorCompra = $valorCompra;
    }
    //
    /**
     * Obtiene el valor de venta del producto.
     *
     * @return float El valor de venta del producto.
     */
    public function getValorVenta()
    {
        return $this->valorVenta;
    }
    /**
     * Establece el valor de venta del producto.
     *
     * @param float $valorVenta El valor de venta del producto.
     */
    public function setValorVenta($valorVenta)
    {
        $this->valorVenta = $valorVenta;
    }
    //
    /**
     * Obtiene la cantidad disponible del producto.
     *
     * @return int La cantidad disponible del producto.
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Establece la cantidad disponible del producto.
     *
     * @param int $cantidad La cantidad disponible del producto.
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    //

    /**
     * Obtiene el detalle del producto.
     *
     * @return string El detalle del producto.
     */
    public function getDetalleProducto()
    {
        return $this->detalleProducto;
    }

    /**
     * Establece el detalle del producto.
     *
     * @param string $detalleProducto El detalle del producto.
     */
    public function setDetalleProducto($detalleProducto)
    {
        $this->detalleProducto = $detalleProducto;
    }
    //
    /**
     * Obtiene el estado del producto.
     *
     * @return string El estado del producto.
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Establece el estado del producto.
     *
     * @param string $estado El estado del producto.
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    /**
     * Obtiene el código del producto.
     *
     * @return string El código del producto.
     */
    public function getCodigo()
    {
        return $this->codgio;
    }
    /**
     * Establece el código del producto.
     *
     * @param string $codigo El código del producto.
     */
    public function setCodigo($codgio)
    {
        $this->codgio = $codgio;
    }
}
?>
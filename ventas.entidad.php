<?php
 class Ventas{
	private $albaran;
	private $factura;
	private $fecha;
	private $dni;
	private $total;
	

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
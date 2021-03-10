<?php
class VentaModel
{
	private $cn;

	public function __CONSTRUCT()
	{
		try
		{
			$this->cn = new PDO('mysql:host=localhost;dbname=tienda', 'despliegue', 'despliegue');
			$this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->cn->prepare("SELECT * FROM ventas");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$ven = new Ventas();

				$ven->__SET('albaran', $r->albaran);
				$ven->__SET('factura', $r->factura);
				$ven->__SET('fecha', $r->fecha);
				$ven->__SET('dni', $r->dni);
				$ven->__SET('total', $r->total);
				

				$result[] = $ven;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	
}
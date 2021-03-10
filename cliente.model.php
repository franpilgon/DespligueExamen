<?php
class ClienteModel
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

			$stm = $this->cn->prepare("SELECT * FROM clientes");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$clie = new Cliente();

				$clie->__SET('dni', $r->dni);
				$clie->__SET('nombre', $r->nombre);
				$clie->__SET('direccion', $r->direccion);
				$clie->__SET('telefono', $r->telefono);
				

				$result[] = $clie;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($dni)
	{
		try 
		{
			$stm = $this->cn->prepare("SELECT * FROM clientes WHERE dni = ?");
			  

				$stm->execute(array($dni));
				$r = $stm->fetch(PDO::FETCH_OBJ);

				$clie = new Cliente();

				$clie->__SET('dni', $r->dni);
				$clie->__SET('nombre', $r->nombre);
				$clie->__SET('direccion', $r->direccion);
				$clie->__SET('telefono', $r->telefono);

			return $clie;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($dni)
	{
		try 
		{
			$stm = $this->cn->prepare("DELETE FROM clientes WHERE dni = ?");			          

			$stm->execute(array($dni));
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Cliente $data)
	{
		try 
		{
			$sql = "UPDATE clientes SET 
						
						nombre          = ?, 

						direccion            = ?, 
						telefono = ?,
						dni        = ?
						
						WHERE dni = ?";

			$this->cn->prepare($sql)->execute(
				array(
					
					$data->__GET('dni'), 
					$data->__GET('nombre'), 
					$data->__GET('direccion'),
					$data->__GET('telefono')
					
					)
				);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
			$sql = "INSERT INTO clientes (dni,nombre,direccion,telefono) VALUES (?, ?, ?, ?)";

			$this->cn->prepare($sql)->execute(
				array(
					
					
					$data->__GET('dni'), 
					$data->__GET('nombre'), 
					
					$data->__GET('direccion'),
					$data->__GET('telefono')
					)
			);
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
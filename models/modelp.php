<?php
class ProductModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=pizzeria', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
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

			$stm = $this->pdo->prepare("SELECT * FROM producto");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Product();

				$alm->__SET('id', $r->id);
				$alm->__SET('Nombre', $r->nombre);
				$alm->__SET('Descripcion', $r->descripcion);
				$alm->__SET('Precio', $r->precio);
				$alm->__SET('Categoria_id', $r->categoria_id);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM producto WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Product();

			$alm->__SET('id', $r->id);
			$alm->__SET('Nombre', $r->nombre);
			$alm->__SET('Descripcion', $r->descripcion);
			$alm->__SET('Precio', $r->precio);
			$alm->__SET('Categoria_id', $r->categoria_id);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM producto WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Product $data)
	{
		try 
		{
			$sql = "UPDATE producto SET 
						Nombre          = ?, 
						Descripcion       = ?,
						Precio           = ?, 
						Categoria_id = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('Nombre'), 
					$data->__GET('Descripcion'), 
					$data->__GET('Precio'),
					$data->__GET('Categoria_id'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(product $data)
	{
		try 
		{
		$sql = "INSERT INTO producto (Nombre,Descripcion,Precio,Categoria_id) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('Nombre'), 
				$data->__GET('Descripcion'), 
				$data->__GET('Precio'),
				$data->__GET('Categoria_id')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
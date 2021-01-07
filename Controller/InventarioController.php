<?php 
include_once '../Model/ConexionDB.php';
include_once '../Model/InventarioModel.php';
class InventarioController extends Conexion
{
	public function ListaDatos()
	{
		$datos1=array();
		$consulta="SELECT * FROM inventario ORDER BY id  ASC";
		try {
			$resultado=$this->conexion->query($consulta);
			foreach ($resultado->fetchAll(PDO::FETCH_OBJ) as $datos) {
				$inventario = new InventarioModel();
				$inventario->__SET('id', $datos->id);
				$inventario->__SET('NombreProducto', $datos->NombreProducto);
				$inventario->__SET('Referencia', $datos->Referencia);
                $inventario->__SET('Precio', $datos->Precio);
                $inventario->__SET('Peso', $datos->Peso);
                $inventario->__SET('Categoria', $datos->Categoria);
                $inventario->__SET('Stock', $datos->Stock);
                $inventario->__SET('FechaCreación', $datos->FechaCreación);
                $inventario->__SET('FechaUltimaVenta', $datos->FechaUltimaVenta);
				$datos1[]=$inventario;
			}
			return $datos1;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insertar(InventarioModel $inventario)
	{
        $insertar="INSERT INTO inventario(id, NombreProducto, Referencia, Precio, Peso, Categoria,
        Stock, FechaCreación, FechaUltimaVenta) 
        VALUES (?,?,?,?,?,?,?,?,?)";
		try {
			$this->conexion->prepare($insertar)->execute(array(
				$inventario->__GET('id'),
                $inventario->__GET('NombreProducto'),
                $inventario->__GET('Referencia'),
                $inventario->__GET('Precio'),
                $inventario->__GET('Peso'),
                $inventario->__GET('Categoria'),
                $inventario->__GET('Stock'),
                $inventario->__GET('FechaCreación'),
                $inventario->__GET('FechaUltimaVenta')
				));
			return true;
		} catch (Exception $e) {
			echo "Error al registrar los datos ".$e->getMessage();
		}
	}
	public function buscar($id)
	{
		$buscar="SELECT * FROM inventario where id=?";
		try {
			$resultado=$this->conexion->prepare($buscar);
			$resultado->execute(array($id));
			$datos=$resultado->fetch(PDO::FETCH_OBJ);
            $inventario = new InventarioModel();
            $inventario->__SET('id', $datos->id);
            $inventario->__SET('NombreProducto', $datos->NombreProducto);
            $inventario->__SET('Referencia', $datos->Referencia);
            $inventario->__SET('Precio', $datos->Precio);
            $inventario->__SET('Peso', $datos->Peso);
            $inventario->__SET('Categoria', $datos->Categoria);
            $inventario->__SET('Stock', $datos->Stock);
            $inventario->__SET('FechaCreación', $datos->FechaCreación);
            $inventario->__SET('FechaUltimaVenta', $datos->FechaUltimaVenta);
			return $inventario;
		} catch (Exception $e) {
			echo "Error al buscar la información ".$e->getMessage();
		}
	}
	public function actualizar(InventarioModel $inventario)
	{
		$actualizar="UPDATE inventario SET NombreProducto=?,Referencia=?,Precio=?,Peso=?,
        Categoria=?,Stock=? WHERE id=? ";
		
		try {
			$this->conexion->prepare($actualizar)->execute(array(
				$inventario->__GET('NombreProducto'),
                $inventario->__GET('Referencia'),
                $inventario->__GET('Precio'),
                $inventario->__GET('Peso'),
                $inventario->__GET('Categoria'),
                $inventario->__GET('Stock'),
				$inventario->__GET('id')

				));
			return true;

		} catch (Exception $e) {
			echo "Error al actualizar los datos ".$e->getMessage();
		}
	}
	public function eliminar($id)
	{
		$eliminar="DELETE FROM inventario WHERE id=? ";
		try {
			$resultado=$this->conexion->prepare($eliminar);
            $resultado->execute(array($id));
            return true;
		} catch (Exception $e) {
			echo "Error al buscar la información ".$e->getMessage();
		}
    }
}
?>
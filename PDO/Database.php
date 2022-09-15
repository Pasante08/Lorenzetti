 <?php

class Database extends PDO
{
	//Definicion de atributos de la clase
	private $driver	='mysql';
	private $host = 'localhost:3306';
	private $dbName = 'fenusas_formuser';
	private $charset = 'utf8';
	private $user = 'fenusas_fenusas';
	private $password = 'UsUaRiOsIsTeMaS2021_FeNuSaS';

	public function __construct()
	{
		try {
			parent::__construct("{$this->driver}:host={$this->host}; dbname={$this->dbName}; charset={$this->charset}",$this->user, $this->password);

			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Conexion a base de datos fallida {$e->getMessage()}";
		}
	}

	//Metodo para realizar consultas a la base de datos
	public function select($strSql, $arrayData = array(), $fetchMode = PDO::FETCH_OBJ)
	{
		$query = $this->prepare($strSql);

		foreach ($arrayData as $key => $value) {
			$query->bindParam(":$key", $value);
		}

		if (!$query->execute()) {
			echo "Error la consulta no se realizo";
		}
		else
		{
			return $query->fetchAll($fetchMode);
		}
	}

	public function selectfetch($strSql, $arrayData = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		$query = $this->prepare($strSql);
		$query->execute($arrayData);
		return $query->fetchAll($fetchMode);
	}

	public function selectfetchP($strSql, $arrayData = array(), $fetchMode = PDO::FETCH_OBJ)
	{
		$query = $this->prepare($strSql);
		$query->execute($arrayData);
		return $query->fetch();
	}

	//Metodo para realizar las inserciones a la base de datos
	public function insert($table, $data)
	{
		try {
			//Ordenar array por key
			ksort($data);
			//Obtener nombre de los campos de la tabla
			$fieldNames = implode('`,`', array_keys($data));
			//Obtener los valores
			$fielValues = ':'. implode(', :', array_keys($data));
			//String de la sentencia
			$strSql = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES($fielValues)");
			//Asignacion de parametros a la sentencia
			foreach ($data as $key => $value) {
				$strSql->bindValue(":$key", $value);
			}
			//Ejecución de la sentencia SQL
			$strSql->execute();
			//Imprimir el ultimo id insertado
			return $this->lastInsertId();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	//Metodo para actualizar un registro en la base de datos
	public function update($table, $data, $where)
	{
		try {
			ksort($data);
			//Atributos que se actualizaran
			$fieldDetails = '';
			//recorrer los datos paara realizar la actualizacion
			foreach ($data as $key => $value) {
				//Reasignando el fieldDetails
				$fieldDetails .= "`$key` =  :$key,";
			}
			//Eliminar el ultimo elemento
			$fieldDetails = rtrim($fieldDetails, ',');

			$query = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
			//Cargar los parametros al String
			foreach ($data as $key => $value) {
				$query->bindValue(":$key", $value);
			}
			$query->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	//Metodo para eliminar un registro en la base de datos
	public function delete($table, $where)
	{
		try {
			return $this->exec("DELETE FROM $table WHERE $where");
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	//Metodo para buscar factura por procedimiento
	public function procedure(int $idFactura, $fetchMode = PDO::FETCH_OBJ)
	{
		try {
			$query = $this->prepare("CALL select_factura('{$idFactura}')");
			$query->execute();
			return $query->fetchAll($fetchMode);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	//Metodo productos mas vendidos
	public function productosMasVendidos($fetchMode = PDO::FETCH_OBJ)
	{
		try {
			$query = $this->prepare("CALL productos_mas_vendidos()");
			$query->execute();
			return $query->fetchAll($fetchMode);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	//Metodo para cambiar el estado del producto
	public function estadoProductos($idProductoSis, $estado, $fetchMode = PDO::FETCH_OBJ)
	{
		try {
			$query = $this->prepare("CALL estado_producto('{$idProductoSis}', '{$estado}')");
			$query->execute();
			return $query->fetchAll($fetchMode);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}
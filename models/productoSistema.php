<?php

    class productoSistema
    {
        private $pdo;

        public function __construct()
        {
            try {
                $this->pdo = new Database;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function newProductSystem($data)
        {
            try {
				return $this->pdo->insert("productoSistema", $data);                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getAll()
        {
            try {
                $strSql = "SELECT * FROM productosistema ORDER BY estado ASC";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getByIdAdmin($id)
        {
            try {
                $strSql = "SELECT * FROM productosistema WHERE idProducto=:id";
                $arrayData = ['id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getById($idProducto, $idVoltaje, $idColor)
        {
            if(!empty($idColor) && !empty($idVoltaje)) {
                $strSql = "SELECT idProducto FROM productosistema WHERE color_id LIKE '$idColor' AND voltaje_id LIKE '$idVoltaje' AND producto_id LIKE '$idProducto'";
                return $this->pdo->select($strSql);
            } elseif(!empty($idColor) && empty($idVoltaje)) {
                $strSql = "SELECT idProducto FROM productosistema WHERE color_id LIKE '$idColor' AND producto_id LIKE '$idProducto'";
                return $this->pdo->select($strSql);
            } elseif(empty($idColor) && !empty($idVoltaje)) {
                $strSql = "SELECT idProducto FROM productosistema WHERE voltaje_id LIKE '$idVoltaje' AND producto_id LIKE '$idProducto'";
               return $this->pdo->select($strSql); 
            } else {
                $strSql = "SELECT idProducto FROM productosistema WHERE producto_id LIKE '$idProducto'";
                return $this->pdo->select($strSql);
            }
        }

        public function editProductoSis($data)
        {
            try {
				$strWhere = 'idProducto ='. $data['idProducto'];
				$table = 'productosistema';
				$this->pdo->update($table, $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
        }

        //Metodo para traer los colores segun el voltaje
        public function colorsByVoltage($id, $Vid)
        {
            try {
                $strSql = "SELECT c.* FROM color AS c 
                            INNER JOIN producto_color AS pc 
                            ON c.idColor = pc.color_id 
                            INNER JOIN productosistema AS ps 
                            ON pc.color_id = ps.color_id 
                            WHERE ps.producto_id=$id AND 
                            ps.voltaje_id=$Vid AND 
                            ps.estado=1 AND pc.color_id<>0 GROUP BY c.idColor";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function productColorByVoltage($id, $Vid)
        {
            try {
                $strSql = "SELECT pc.* FROM producto_color AS pc
                            INNER JOIN productosistema AS ps
                            ON pc.color_id = ps.color_id
                            WHERE pc.producto_id=$id AND
                            ps.voltaje_id=$Vid AND
                            ps.estado=1 GROUP BY pc.idProductoColor";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function updateStatus($id, $estado)
        {
            try {
                if($estado != 1) {
                    $estado = 1;
                } else {
                    $estado = 0;
                }
                $this->pdo->estadoProductos($id, $estado);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function searchCodigo($cod)
        {
            try {
                $strSql = "SELECT * FROM productosistema WHERE codigo LIKE '%$cod%'";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
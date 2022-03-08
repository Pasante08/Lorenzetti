<?php

    class Producto{
        
        private $idProducto;
        private $codigo;
        private $nombre;
        private $precio;
        private $categoria_id;
        private $estado;
        private $voltaje;
        private $color;

        public function __construct()
        {
            try {
                $this->pdo = new Database;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function newProduct($data)
        {
            try {
				return $this->pdo->insert("producto", $data);                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getAll()
        {
            try {
                $strSql = "SELECT * FROM producto";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getById($id)
        {
            try {
                $strSql = "SELECT * FROM producto WHERE idProducto=:id";
                $arrayData = ['id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function editProducto($data)
        {
            try {
				$strWhere = 'idProducto ='. $data['idProducto'];
				$table = 'producto';
				$this->pdo->update($table, $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
        }

        public function searchProducts($bool, $search)
        {
            if($bool) {
                $strSql = "SELECT * FROM producto WHERE nombre LIKE '%$search%'";
            } else {
                $strSql = "SELECT * FROM producto WHERE MATCH (nombre) AGAINST ( '$search' )";
            }
            return $this->pdo->select($strSql);
        }

        public function searchProductByCat($bool, $search, $cat)
        {
            if($bool) {
                $srtSql = "SELECT * FROM producto WHERE nombre LIKE '%$search%' AND categoria_id LIKE '%$cat%'";
            } else {
                $strSql = "SELECT * FROM producto WHERE MATCH (nombre) AGAINST ( '$search' ) AND categoria_id LIKE '%$cat%'";
            }
            return $this->pdo->select($strSql);
        }

        public function productLimit($id)
        {
            $strSql = "SELECT * FROM producto WHERE categoria_id=:id LIMIT 8";
            $arrayData = ['id' => $id];
            return $this->pdo->select($strSql, $arrayData);
        }

        public function filtros($id, $filtro)
        {
            try {
                $strSql = "";
                switch ($filtro) {
                    case 'color':
                        $strSql = "SELECT C.* FROM color AS c
                        INNER JOIN producto_color AS pc
                        ON c.idColor = pc.color_id
                        WHERE pc.producto_id =:id";
                        break;
                    case 'voltaje':
                        $strSql = "SELECT v.* FROM voltaje AS v
                        INNER JOIN producto_voltaje AS pv
                        ON v.idVoltaje = pv.voltaje_id
                        WHERE pv.producto_id =:id";
                        break;
                }
                $arrayData = ['id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
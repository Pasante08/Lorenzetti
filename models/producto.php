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

        public function productsDes()
        {
            try {
                return $this->pdo->productosMasVendidos();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        //Metodo para traer todos los productos
        public function getAllStatus()
        {
            try {
                $strSql = "SELECT * FROM producto";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        //Metodo para traer los productos ACTIVOS
        public function getAll()
        {
            try {
                $strSql = "SELECT * FROM producto WHERE estado = 1 ORDER BY categoria_id ASC";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function filterByCat($id)
        {
            try {
                $strSql = "SELECT * producto WHERE categoria_id=:id AND estado = 1";
                $arrayData = ['id' => $id];
                return $this->pdo->select($strSql, $arrayData);
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

        public function getByIdViewCart($id, $idC)
        {
            try {
                if(!empty($idC)) {
                    $strSql = "SELECT p.nombre, p.precio, p.preciosi, pc.ubicacion FROM producto AS p 
                    INNER JOIN producto_color AS pc 
                    ON pc.producto_id = p.idProducto WHERE p.idProducto = '$id' AND pc.color_id = '$idC'";
                    return $this->pdo->select($strSql);
                } else {
                    $strSql = "SELECT nombre, precio, preciosi, ubicacion FROM producto WHERE idProducto=:id";
                    $arrayData = ['id' => $id];
                    return $this->pdo->select($strSql, $arrayData);
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getByIdCart($id, $color)
        {
            try {
                if($color != 0) {
                    $strSql = "SELECT p.idProducto, p.nombre, p.precio, pc.ubicacion AS imagen FROM producto AS p
                    INNER JOIN producto_color AS pc 
                    ON pc.producto_id = p.idProducto WHERE idProducto=:id";
                    $arrayData = ['id' => $id];
                    $row = $this->pdo->selectfetchP($strSql, $arrayData);
                    $item = [
                            'idProducto'    => $row['idProducto'],
                            'nombre'        => $row['nombre'],
                            'precio'        => $row['precio'],
                            'imagen'     => $row['imagen']
                        ];
                    return json_encode(['statuscode' => 200, 'item' => $item]);
                } else {
                    $strSql = "SELECT p.idProducto, p.nombre, p.precio, p.ubicacion AS imagen FROM producto AS p
                    WHERE p.idProducto=:id";
                    $arrayData = ['id' => $id];
                    $row = $this->pdo->selectfetchP($strSql, $arrayData);
                    $item = [
                            'idProducto'    => $row['idProducto'],
                            'nombre'        => $row['nombre'],
                            'precio'        => $row['precio'],
                            'imagen'     => $row['imagen']
                        ];
                    return json_encode(['statuscode' => 200, 'item' => $item]);
                }
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
                $strSql = "SELECT * FROM producto WHERE nombre LIKE '%$search%' AND estado = 1";
            } else {
                $strSql = "SELECT * FROM producto WHERE MATCH (nombre) AGAINST ( '$search' ) AND estado = 1";
            }
            return $this->pdo->select($strSql);
        }

        public function searchProductByCat($bool, $search, $cat)
        {
            if($bool) {
                $strSql = "SELECT * FROM producto WHERE nombre LIKE '%$search%' AND categoria_id LIKE '%$cat%' AND estado = 1";
            } else {
                $strSql = "SELECT * FROM producto WHERE MATCH (nombre) AGAINST ( '$search' ) AND categoria_id LIKE '%$cat%' AND estado = 1";
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
                        WHERE pc.producto_id =:id AND pc.estado=1";
                        break;
                    case 'voltaje':
                        $strSql = "SELECT v.* FROM voltaje AS v
                        INNER JOIN producto_voltaje AS pv
                        ON v.idVoltaje = pv.voltaje_id
                        WHERE pv.producto_id =:id AND pv.estado=1";
                        break;
                }
                $arrayData = ['id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function productsByCat($id)
        {
            try {
                $strSql = "SELECT * FROM producto WHERE categoria_id =:categoria_id AND estado = 1";
                $arrayData = ['categoria_id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function update($data)
        {
            try {
                if($data['estado'] != 1) {
                    $data['estado'] = 1;
                } else {
                    $data['estado'] = 0;
                }
                $strWhere = 'idProducto ='. $data['idProducto'];
                $this->pdo->update('producto', $data, $strWhere);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
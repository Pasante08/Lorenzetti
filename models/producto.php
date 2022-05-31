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

        public function filterByCat($id)
        {
            try {
                $strSql = "SELECT * producto WHERE categoria_id=:id";
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
                    /*print($row);
                    die();*/
                    $item = [
                            'idProducto'    => $row['idProducto'],
                            'nombre'        => $row['nombre'],
                            'precio'        => $row['precio'],
                            'imagen'     => $row['imagen']
                        ];
                        /*print_R($item);
                        die();*/
                    return json_encode(['statuscode' => 200, 'item' => $item]);
                } else {
                    $strSql = "SELECT p.idProducto, p.nombre, p.precio, p.ubicacion AS imagen FROM producto AS p
                    WHERE p.idProducto=:id";
                    $arrayData = ['id' => $id];
                    $row = $this->pdo->selectfetchP($strSql, $arrayData);
                    /*print($row);
                    die();*/
                    $item = [
                            'idProducto'    => $row['idProducto'],
                            'nombre'        => $row['nombre'],
                            'precio'        => $row['precio'],
                            'imagen'     => $row['imagen']
                        ];
                        /*print_R($item);
                        die();*/
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
                $strSql = "SELECT * FROM producto WHERE nombre LIKE '%$search%'";
            } else {
                $strSql = "SELECT * FROM producto WHERE MATCH (nombre) AGAINST ( '$search' )";
            }
            return $this->pdo->select($strSql);
        }

        public function searchProductByCat($bool, $search, $cat)
        {
            if($bool) {
                $strSql = "SELECT * FROM producto WHERE nombre LIKE '%$search%' AND categoria_id LIKE '%$cat%'";
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

        public function productsByCat($id)
        {
            try {
                $strSql = "SELECT * FROM producto WHERE categoria_id =:categoria_id";
                $arrayData = ['categoria_id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
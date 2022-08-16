<?php 

    class ProductoColor{

        private $producto_id;
        private $color_id;
        private $imagen;
        private $ubicacion;

        public function __construct()
        {
            try {
                $this->pdo = new Database;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getAll()
        {
            try {
                $strSql = "SELECT pc.*,
                            p.nombre AS producto,
                            c.nombre AS color
                            FROM producto_color AS pc
                            INNER JOIN producto p
                            ON p.idProducto = pc.producto_id
                            INNER JOIN color AS c
                            ON c.idColor = pc.color_id";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getById($id)
        {
            try {
                $strSql = "SELECT * FROM producto_color WHERE producto_id=:producto_id AND estado = 1";
                $arrayData = ['producto_id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function editPC($data)
        {
            try {
                $strWhere = 'idProductoColor ='. $data['idProductoColor'];
                $table = 'producto_color';
                $this->pdo->update($table, $data, $strWhere);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function updatePC($data)
        {
            try {
                if($data['estado'] != 1) {
                    $data['estado'] = 1;
                } else {
                    $data['estado'] = 0;
                }
                $strWhere = 'idProductoColor ='. $data['idProductoColor'];
                $this->pdo->update('producto_color', $data, $strWhere);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
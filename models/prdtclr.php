<?php 

    class prdtclr {
        private $producto_id;
        private $voltaje_id;

        public function __construct()
        {
            try {
                $this->pdo = new Database;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function newVoltajeProducto($data)
        {
            try {
                return $this->pdo->insert("producto_voltaje", $data);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getAll()
        {
            try {
                $strSql = "SELECT * FROM producto_voltaje";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getById($id)
        {
            try {
                $strSql = "SELECT * FROM producto_voltaje WHERE idProductoVoltaje=:idProductoVoltaje";
                $arrayData = ['idProductoVoltaje' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function editPV($data)
        {
            try {
                $strWhere = 'idProductoVoltaje ='. $data['idProductoVoltaje'];
                $table = 'producto_voltaje';
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
                $strWhere = 'idProductoVoltaje ='. $data['idProductoVoltaje'];
                $this->pdo->update('producto_voltaje', $data, $strWhere);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
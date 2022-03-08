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
    }
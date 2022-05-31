<?php

    class Voltaje {
        private $productoId;
        private $voltajeId;
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

        public function newVoltaje($data)
        {
            try {
                return $this->pdo->insert("voltaje", $data);
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
                $strSql = "SELECT * FROM voltaje WHERE idVoltaje=:id";
                $arrayData = ['id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
<?php

    class Color {
        private $productoId;
        private $colorId;
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

        public function newColor($data)
        {
            try {
                return $this->pdo->insert("color", $data);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function newColorProducto($data)
        {
            try {
                return $this->pdo->insert("producto_color", $data);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getAll()
        {
            try {
                $strSql = "SELECT * FROM producto_color";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
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
                /*print_R($data);
                die();*/
				return $this->pdo->insert("productoSistema", $data);                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getAll()
        {
            try {
                $strSql = "SELECT * FROM productosistema";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getById($idProducto, $idVoltaje, $idColor)
        {
            if(!empty($idColor) && !empty($idVoltaje)) {
                //print("No estan vacios".$idColor." voltaje".$idVoltaje." producto".$idProducto);
                $strSql = "SELECT idProducto FROM productosistema WHERE color_id LIKE '$idColor' AND voltaje_id LIKE '$idVoltaje' AND producto_id LIKE '$idProducto'";
                return $this->pdo->select($strSql);//die();
            } elseif(!empty($idColor) && empty($idVoltaje)) {
                //print("Color lleno y voltaje vacio");
                $strSql = "SELECT idProducto FROM productosistema WHERE color_id LIKE '$idColor' AND producto_id LIKE '$idProducto'";
                return $this->pdo->select($strSql);//die();
            } elseif(empty($idColor) && !empty($idVoltaje)) {
                //print("Color vacio y voltaje lleno");
                $strSql = "SELECT idProducto FROM productosistema WHERE voltaje_id LIKE '$idVoltaje' AND producto_id LIKE '$idProducto'";
                //print_R($strSql);
               return $this->pdo->select($strSql); //die();
            } else {
                //print("Color vacio y voltaje vacio");
                $strSql = "SELECT idProducto FROM productosistema WHERE producto_id LIKE '$idProducto'";
                return $this->pdo->select($strSql);//die();
            }
        }
    }
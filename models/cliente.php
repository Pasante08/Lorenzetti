<?php

    class Cliente{

        private $idCliente;
        private $nombre;
        private $apellido;
        private $correo;
        private $telefono;
        
        public function __construct()
        {
            try {
                $this->pdo = new Database;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function newClient($data)
        {
            try {
				return $this->pdo->insert("cliente", $data);                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
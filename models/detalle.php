<?php

class Detalle
{
    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function newDetalleco($datos)
    {
        try {
            return $this->pdo->insert("detalle_factura", $datos);                
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
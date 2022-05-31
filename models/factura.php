<?php

    class Factura{

        private $idFactura;

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
                $strSql = "SELECT f.*, cl.nombre FROM factura AS f 
                INNER JOIN cliente AS cl 
                ON cl.idCliente = f.cliente_id
                ORDER BY idFactura DESC";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getById($id)
        {
            try {
                $strSql = "SELECT f.*, cl.nombre FROM factura AS f
                INNER JOIN cliente AS cl
                ON cl.idCliente = f.cliente_id
                WHERE idFactura=:id";
                $arrayData = ['id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function view($id)
        {
            try {
                return $this->pdo->procedure($id);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function newFact($data)
        {
            try {
				return $this->pdo->insert("factura", $data);                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function existRef($transaction)
        {
            try {
				$strSql = "SELECT idFactura FROM factura WHERE refac=:refac";
                $arrayData = ['refac' => $transaction['ref']];
                $request = $this->pdo->select($strSql, $arrayData);
                if(empty($request)) {
                    echo 'La variable esta vacia';
                    die();
                } else {
                    $strWhere = 'idFactura ='. $request[0]->idFactura;
                    unset($transaction['env'], $transaction['ref']);
                    $data['transaccion'] = $transaction['id'];
                    $this->pdo->update("factura", $data, $strWhere);
                    return $this->pdo->procedure($request[0]->idFactura);
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function selectFacturas($id)
        {
            try {
                return $this->pdo->procedure($id);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
<?php

    class Municipio {
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

        public function newMunicipio($data)
        {
            try {
                return $this->pdo->insert("municipios", $data);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getAll()
        {
            try {
                $strSql = "SELECT * FROM municipios";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getById($id)
        {
            try {
                $strSql = "SELECT * FROM municipios WHERE idMunicipio=:id";
                $arrayData = ['id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function editMunicipio($data)
        {
            try {
				$strWhere = 'idMunicipio ='. $data['idMunicipio'];
				$table = 'municipios';
				$this->pdo->update($table, $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
        }

        public function listByDepa($id)
        {
            try {
                $strSql = "SELECT m.* FROM municipios AS m
                    INNER JOIN departamentos AS d
                    ON d.idDepartamento = m.departamento_id
                    WHERE d.idDepartamento=:id ORDER BY d.nombre, m.nombre";
                $arrayData = ['id' => $id];
                return $this->pdo->selectfetch($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function searchNombre($name)
        {
            try {
                $strSql = "SELECT * FROM municipios WHERE nombre LIKE '%$name%'";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
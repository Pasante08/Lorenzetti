<?php

    class Ayuda{

        private $idHelpfaq;
        private $question;
        private $answer;

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
                $strSql = "SELECT * FROM helpfaq";
                return $this->pdo->select($strSql);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function newAyuda($data)
        {
            try {
				return $this->pdo->insert("helpfaq", $data);                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getById($id)
        {
            try {
                $strSql = "SELECT * FROM helpfaq WHERE idHelpfaq=:id";
                $arrayData = ['id' => $id];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function edit($data)
        {
            try {
                $strWhere = 'idHelpfaq ='. $data['idHelpfaq'];
                $table = 'helpfaq';
                $this->pdo->update($table, $data, $strWhere);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        public function getBycat($idCat)
        {
            try {
                $strSql = "SELECT * FROM helpfaq WHERE categoria_id=:idCat";
                $arrayData = ['idCat' => $idCat];
                return $this->pdo->select($strSql, $arrayData);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
<?php

require 'models/departamento.php';
require 'models/municipio.php';

    class departamentoController {

        public function __construct()
        {
            $this->deparModel = new Departamento;
            $this->munisModel = new Municipio;
        }

        public function muniPorDepa()
        {
            if(isset($_POST['id'])) {
                $munis = $this->munisModel->listByDepa($_POST['id']);
                print_r( json_encode ( $munis ) );
            } else {
                /*print("No existe");
                die();*/
            }
        }
    }
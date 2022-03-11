<?php

require 'models/carrito.php';

    class carritoController {

        public function __construct()
        {
            $this->carrito = new Carrito;
        }

        public function add() {
            /*var_dump($_POST);
            die();*/
            if(isset($_POST['id'])) {
                if(isset($_POST['color_id'])) {
                    if(isset($_POST['voltaje_id'])) {
                        echo "tiene color y voltaje";
                        $filtros = array("idC" => $_POST['color_id'], "NC" => $_POST['C_nombre'], "idV" => $_POST['voltaje_id'], "NV" => $_POST['V_nombre']);
                        $responsive = $this->carrito->addItem($_POST['id'], $_POST['quantity'], $filtros);
                    } else {
                        echo "tiene color, pero no voltaje";
                        $filtros = array("idC" => $_POST['color_id'], "NC" => $_POST['C_nombre'], "idV" => null, "NV" => null);
                        $responsive = $this->carrito->addItem($_POST['id'], $_POST['quantity'], $filtros);
                    }
                } elseif (isset($_POST['voltaje_id'])) {
                    if(isset($_POST['color_id'])) {
                        echo "tiene voltaje y color";
                        $filtros = array("idC" => $_POST['color_id'], "NC" => $_POST['C_nombre'], "idV" => $_POST['voltaje_id'], "NV" => $_POST['V_nombre']);
                        $responsive = $this->carrito->addItem($_POST['id'], $_POST['quantity'], $filtros);
                    } else {
                        echo "tiene voltaje, pero no color";
                        $filtros = array("idC" => null, "NC" => null, "idV" => $_POST['voltaje_id'], "NV" => $_POST['V_nombre']);
                        $responsive = $this->carrito->addItem($_POST['id'], $_POST['quantity'], $filtros);
                    }
                } else {
                    echo "No tiene ninguna de las dos";
                    //$filtros = array("idC" => $_POST['color_id'], "NC" => $_POST['C_nombre'], "idV" => $_POST['voltaje_id'], "NV" => $_POST['V_nombre']);
                    $responsive = $this->carrito->addItem($_POST['id'], $_POST['quantity'], null);
                }
            } else {
                print("No llego");
                die();
            }
        }
    }
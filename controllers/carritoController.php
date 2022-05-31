<?php

use PhpOffice\PhpSpreadsheet\Chart\Chart;

require 'models/carrito.php';
require 'models/producto.php';
require 'models/color.php';
require 'models/voltaje.php';
require 'models/departamento.php';

    class carritoController {

        public function __construct()
        {
            $this->carrito = new Carrito;
            $this->productoModel = new Producto;
            $this->colorModel = new Color;
            $this->voltajeModel = new Voltaje;
            $this->deparModel = new Departamento;
        }

        public function session_destroy() {
            $this->carrito->sessionOff();
            $productos = $this->productoModel->getAll();
            require 'views/index.php';
        }

        public function add() {
            /*var_dump($_POST);
            die();*/
            if(isset($_POST['id'])) {
                if(isset($_POST['color_id'])) {
                    if(isset($_POST['voltaje_id'])) {
                        //echo "tiene color y voltaje";
                        $color = $this->colorModel->getById($_POST['color_id']);
                        /*print_r($color);
                        die();*/
                        $voltaje = $this->voltajeModel->getById($_POST['voltaje_id']);
                        $filtros = array("idC" => $_POST['color_id'], "NC" => $color[0]->nombre, "idV" => $_POST['voltaje_id'], "NV" => $voltaje[0]->nombre);
                        $responsive = $this->carrito->addItem($_POST['id'], $_POST['quantity'], $filtros);
                        $products = $this->productoModel->getAll();
                require 'views/products.php';
                        /*print_R($responsive);
                        die();*/
                    } else {
                        //echo "tiene color, pero no voltaje";
                        $color = $this->colorModel->getById($_POST['color_id']);
                        /*print_r($color);
                        die();*/
                        $filtros = array("idC" => $_POST['color_id'], "NC" => $color[0]->nombre, "idV" => null, "NV" => null);
                        $responsive = $this->carrito->addItem($_POST['id'], $_POST['quantity'], $filtros);
                        $products = $this->productoModel->getAll();
                require 'views/products.php';
                    }
                } elseif (isset($_POST['voltaje_id'])) {
                    if(isset($_POST['color_id'])) {
                        //echo "tiene voltaje y color";
                        $color = $this->colorModel->getById($_POST['color_id']);
                        /*print_r($color);
                        die();*/
                        $voltaje = $this->voltajeModel->getById($_POST['voltaje_id']);
                        $filtros = array("idC" => $_POST['color_id'], "NC" => $color[0]->nombre, "idV" => $_POST['voltaje_id'], "NV" => $voltaje[0]->nombre);
                        $responsive = $this->carrito->addItem($_POST['id'], $_POST['quantity'], $filtros);
                        $products = $this->productoModel->getAll();
                require 'views/products.php';
                    } else {
                        //echo "tiene voltaje, pero no color";
                        $voltaje = $this->voltajeModel->getById($_POST['voltaje_id']);
                        $filtros = array("idC" => null, "NC" => null, "idV" => $_POST['voltaje_id'], "NV" => $voltaje[0]->nombre);
                        $responsive = $this->carrito->addItem($_POST['id'], $_POST['quantity'], $filtros);
                        $products = $this->productoModel->getAll();
                require 'views/products.php';
                        /*print_R($responsive);
                        die();*/
                    }
                } else {
                    //echo "No tiene ninguna de las dos";
                    //$filtros = array("idC" => $_POST['color_id'], "NC" => $_POST['C_nombre'], "idV" => $_POST['voltaje_id'], "NV" => $_POST['V_nombre']);
                    $responsive = $this->carrito->addItem($_POST['id'], $_POST['quantity'], null);
                    $products = $this->productoModel->getAll();
                require 'views/products.php';
                }
            } else {
                print("No llego");
                die();
            }
        }

        public function removeItem()
        {
            if(isset($_POST)) {
                /*print_r($_POST);
                die();*/
                $id = $_POST['id'];
                $res = $this->carrito->remove($id);
                if($res) {
                   echo true;
                }
                /*print("llego". $id);
                die();*/
            } else {
                print("no llego");
                die();
            }
        }

        public function addItemP()
        {
            if(isset($_POST)) {
                /*print_R($_POST);
                die();*/
                //$filtros = [];
                //$filtros = $_POST;
                //$res = json_decode($this->carrito->addQuantity($_POST['id'], $_POST['quantity'], $filtros), 1);
                $res = json_decode($this->carrito->addQuantityP($_POST['idCart'], $_POST['quantity']), 1);
                
                /*for ($i=0; $i<sizeof($res); $i++) {
                    var_dump($res[$i]['id']);
                }*/
                /*foreach ($res as $r) {
                    print($r->id);
                }*/
                die();
                //echo $res;
            } else {

            }
        }

        public function generateCod()
        {
            $permitted_chars = '123456789abcdefghijklmnopqrstuvwxyz';

            echo substr(str_shuffle($permitted_chars), 0, 10);
        }

        public function mostrar()
        {
            $itemsCarrito = json_decode($this->carrito->load(), 1);
            /*print_R($itemsCarrito);
            die();*/
            $fullItems = [];
            $total = 0;
            $totalItems = 0;
            foreach ($itemsCarrito as $itemCarrito) {
                $httpRequest = $this->productoModel->getByIdCart($itemCarrito['id'], $itemCarrito['idC']);
                /*print_R($httpRequest);
                die();*/
                $itemProducto = json_decode($httpRequest, 1)['item'];
                /*print_R($itemProducto);
                die();*/
                $itemProducto['cantidad'] = $itemCarrito['cantidad'];
                /*print_R($itemProducto);
                die();*/
                $itemProducto['subtotal'] = $itemProducto['cantidad'] * $itemProducto['precio'];
                /*print_R($itemProducto);
                die();*/
                $total += $itemProducto['subtotal'];
                $totalItems += $itemProducto['cantidad'];
                array_push($fullItems, $itemProducto);

            }
            $resArray = array('info' => ['count' => $totalItems, 'total' => number_format($total)] , 'items' => $fullItems);
            /*print_R($resArray);
            insert facturua 
            fecha date();
            die();*/
            echo json_encode($resArray);
        }

        public function viewCart()
        {
            $totalItems = 0;
            $itemsCarrito =json_decode($this->carrito->load(), 1);
            /*print_R($itemsCarrito);
            die();*/
            $carrito = [];
            $total = 0;
            $totalsi = 0;
            foreach ($itemsCarrito as $itemsCarrito) {
                $http = $this->productoModel->getByIdViewCart($itemsCarrito['id'], $itemsCarrito['idC']);
                /*print_R($http);
                die();*/
                foreach ($http as $item) {
                    $item->idProducto = $itemsCarrito['id'];
                    $item->cantidad = $itemsCarrito['cantidad'];
                    $item->idC = $itemsCarrito['idC'];
                    $item->NC = $itemsCarrito['NC'];
                    $item->idV = $itemsCarrito['idV'];
                    $item->NV = $itemsCarrito['NV'];
                    $item->subtotal = $itemsCarrito['cantidad'] * $item->precio;
                    $item->subtotalsi = $itemsCarrito['cantidad'] * $item->preciosi;
                    $total += $item->subtotal;
                    $totalsi += $item->subtotalsi;
                    //print($item->subtotal);
                }
                //$carrito = array('total' => $total);
                //print_R($carrito);
                array_push($carrito, $http);
            }
            $departamentos = $this->deparModel->getAll();
            
            require 'views/cart.php';
        }

        public function prueba()
        {
            $totalItems = 0;
            $itemsCarrito =json_decode($this->carrito->load(), 1);
            /*print_R($itemsCarrito[0]);
            die();*/
            $carrito = [];
            foreach ($itemsCarrito as $itemsCarrito) {
                $http = $this->productoModel->getByIdViewCart($itemsCarrito['id'], $itemsCarrito['idC']);
                /*print_R($http);
                die();*/
                foreach ($http as $item) {
                    $item->idProducto = $itemsCarrito['id'];
                    $item->cantidad = $itemsCarrito['cantidad'];
                    $item->idC = $itemsCarrito['idC'];
                    $item->NC = $itemsCarrito['NC'];
                    $item->idV = $itemsCarrito['idV'];
                    $item->NV = $itemsCarrito['NV'];
                    $item->subtotal = $itemsCarrito['cantidad'] * $item->precio;
                    //print($item->subtotal);
                }
                array_push($carrito, $http);
            }
            /*foreach ($carrito as $product) {
                print_R($carrito[1]);
                die();*/
                /*foreach ($product as $producto => $value) {
                    print_R($product);
                    //die();
                }*/
                //print_R($carrito[$product][0]->cantidad);
                //die();
            /*}*/
            for ($i=0; $i <sizeof($carrito); $i++) { 
                print_R($carrito[$i][$i]);
            }
            //print_R($carrito);
            //die();
            $departamentos = $this->deparModel->getAll();
        }

        public function update()
        {
            
        }

        public function payment()
        {
            require 'views/checkout.php';
        }
    }
<?php

include_once 'session.php';

    class Carrito extends Session
    {
        function __construct()
        {
            parent::__construct('carrito');
        }
        public function addItem($id, $quantity, $filtros)
        {
            print_R($filtros[0]->idC);
            die();
            if($this->getValue() == NULL) {
                $items = [];
            } else {
                $items = json_decode($this->getValue(), 1);
                for ($i=0; $i<sizeof($items); $i++) {
                    //Validacion Color - voltaje vacios
                    if($filtros) {
                        if($items[$i]['id'] == $id && $items[$i]['']) {

                        }
                    } else {
                        if($items[$i]['id'] == $id) {
                            $items[$i]['cantidad']+=intval($quantity);
        
                            $this->setValue(json_encode($items));
        
                            return $this->getValue();
                        }
                    }
                }
            }

            //operaciones cuando el carrito tiene un nuevo elemento
            //$item = ['id' => (int)$id, 'cantidad' => $quantity, 'idC' => (int)
        }
    }
<?php

include_once 'session.php';

    class Carrito extends Session
    {
        function __construct()
        {
            parent::__construct('carrito');
        }

        public function load() {
            if($this->getValue() == NULL) {
                return '[]';
            }
            return $this->getValue();
        }

        public function addItem($id, $quantity, $filtros)
        {
            if($this->getValue() == NULL) {
                $items = [];
            } else {
                $items = json_decode($this->getValue(), 1);
                for ($i=0; $i<sizeof($items); $i++) {
                    //Validacion Color - voltaje vacios
                    if($filtros) {
                        //Validacion color - voltaje existen
                        if($items[$i]['id'] == $id && $filtros['idC'] != null && $filtros['idV'] != null) {
                            if($items[$i]['idC'] == $filtros['idC'] && $items[$i]['idV'] == $filtros['idV']) {
                                $items[$i]['cantidad']+=intval($quantity);
    
                                $this->setValue(json_encode($items));
    
                                return $this->getValue();
                            }
                        //Validacion color existe y voltaje no 
                        } elseif ($items[$i]['id'] == $id && $filtros['idC'] != null && $filtros['idV'] == null) {
                            if($items[$i]['idC'] == $filtros['idC']) {
                                $items[$i]['cantidad']+=intval($quantity);
    
                                $this->setValue(json_encode($items));
    
                                return $this->getValue();
                            }
                        //Validacion voltaje existe y color no 
                        } elseif ($items[$i]['id'] == $id && $filtros['idC'] == null && $filtros['idV'] != null) {
                            if($items[$i]['idV'] == $filtros['idV']) {
                                $items[$i]['cantidad']+=intval($quantity);
    
                                $this->setValue(json_encode($items));
    
                                return $this->getValue();
                            }
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
            $item = ['id' => (int)$id, 'cantidad' => $quantity, 'idC' => (int)$filtros['idC'], 'NC' => $filtros['NC'], 'idV' => $filtros['idV'], 'NV' => $filtros['NV']];

            array_push($items, $item);

            $this->setValue(json_encode($items));

            return $this->getValue();

        }
    }
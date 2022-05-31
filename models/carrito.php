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
            /*print_R($this->getValue());
            die();*/
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
                        /*print("no tiene color ni voltaje");
                        die();*/
                        if($items[$i]['id'] == $id) {
                            $items[$i]['cantidad']+=intval($quantity);
        
                            $this->setValue(json_encode($items));

                            return $this->getValue();
                        }
                    }
                }
            }
            if($filtros) {
                //operaciones cuando el carrito tiene un nuevo elemento
                $item = ['id' => $id, 'cantidad' => $quantity, 'idC' => (int)$filtros['idC'], 'NC' => $filtros['NC'], 'idV' => $filtros['idV'], 'NV' => $filtros['NV']];
            } else {
                $item = ['id' => $id, 'cantidad' => $quantity, 'idC' => "", 'NC' => "", 'idV' => "", 'NV' => ""];
            }
            array_push($items, $item);
            $this->setValue(json_encode($items));
            return $this->getValue();
        }

        public function addQuantity($id, $quantity, $filtros)
        {
            if($this->getValue() == null) {
                $items = [];
            } else {
                /*print_r($filtros);
                die();*/
                $items = json_decode ($this->getValue(), 1);
                /*print_r($items);
                die();*/
                for($i=0; $i<sizeof($items); $i++) {
                    if($filtros) {
                        //Validacion color - voltaje existen
                        if($items[$i]['id'] == $id && $filtros['idC'] != null && $filtros['idV'] != null) {
                            if($items[$i]['idC'] == $filtros['idC'] && $items[$i]['idV'] == $filtros['idV']) {
                                $items[$i]['cantidad']=intval($quantity);
    
                                $this->setValue(json_encode($items));
                                /*print($items[$i]['cantidad']);
                                die();*/
                                return $this->getValue();
                            }
                        //Validacion color existe y voltaje no 
                        } elseif ($items[$i]['id'] == $id && $filtros['idC'] != null && $filtros['idV'] == null) {
                            if($items[$i]['idC'] == $filtros['idC']) {
                                $items[$i]['cantidad']=intval($quantity);
    
                                $this->setValue(json_encode($items));
    
                                return $this->getValue();
                            }
                        //Validacion voltaje existe y color no 
                        } elseif ($items[$i]['id'] == $id && $filtros['idC'] == null && $filtros['idV'] != null) {
                            if($items[$i]['idV'] == $filtros['idV']) {
                                $items[$i]['cantidad']=intval($quantity);
    
                                $this->setValue(json_encode($items));
    
                                return $this->getValue();
                            }
                        }
                    } else {
                        if($items[$i]['id'] == $id) {
                            $items[$i]['cantidad']=intval($quantity);
        
                            $this->setValue(json_encode($items));

                            return $this->getValue();
                        }
                    }
                }
            }
        }

        public function addQuantityP($id, $quantity)
        {
            print("Cantidad ".$quantity);
            print("Id ". $id);
            //die();
            if($this->getValue() == null) {
                $items = [];
            } else {
                $items = json_decode($this->getValue(), 1);
                /*print_R($items);
                die();*/
                for($i=0; $i<sizeof($items); $i++) {
                    $llave = key($items);
                    next($items);
                    print("llave ".$llave. " - ");
                    if($llave == $id){
                        print("Quedo ".$llave);
                        //die();
                        print_R(" cantidad actual ".$items[$i]['cantidad']);
                        $items[$i]['cantidad'] = $quantity;
                        print_R(" cantidad Nueva ".$items[$i]['cantidad']);
                        //die();
                        $this->setValue(json_encode($items));
                        //print_r($items);
                        //die();
                        return $this->getValue();
                    } else {

                    }
                    //print_r($items);
                    //next($items);
                    
                    //print(key($items));
                        
                }
            }
        }

        public function remove($id)
        {
            if($this->getValue() == NULL) {
                $items = [];
             } else {
                $items = json_decode($this->getValue(), 1);

                for ($i=0; $i < sizeof($items); $i++) { 
                    $llave = key($items);
                    next($items);
                   if($llave == $id) {
                           unset($items[$i]);
                           $items = array_values($items);
    
                       $this->setValue(json_encode($items));
                       return true;
                   }
                }
             }
        }
    }
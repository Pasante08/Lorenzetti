<?php

    require 'models/productoSistema.php';
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    class productoSisController
    {
        private $productoSisModel;

        public function __construct()
        {
            $this->productoSisModel = new productoSistema;
        }

        public function adminIndex()
        {
            $productos = $this->productoSisModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/productoSis/addProductSis.php';
        }

        public function addExcel()
        {
            if(empty($_REQUEST['file'])) {
                $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
                if(in_array($_FILES["file"]["type"],$allowedFileType)){
                    $targetPath = 'files/'.$_FILES['file']['name'];
                    move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                    $Reader = IOFactory::load($targetPath);
                    /*print($indiceFila);
                    die();*/
                    $totalHojas = $Reader->getSheetCount();
                    $hojaActual =$Reader->getSheet(0);
                    $numeroFilas = $hojaActual->getHighestDataRow();
                    $variable = array();
                    for($indiceFila = 1; $indiceFila<=$numeroFilas; $indiceFila++) {
                        $indice=0;
                        $codigo = "";
                        $codigo = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
                        $variable['codigo']=$codigo;
                        $nombre = "";
                        $nombre = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                        $variable['nombre']=$nombre;
                        $voltaje_id = "";
                        $voltaje_id = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
                        if(empty($voltaje_id)){
                            $voltaje_id=0;
                        }
                        $variable['voltaje_id']=$voltaje_id;
                        $color_id = "";
                        $color_id = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
                        if(empty($color_id)){
                            $color_id=0;
                        }
                        $variable['color_id']=$color_id;
                        $producto_id = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
                        if(empty($producto_id)){
                            $producto_id=0;
                        }
                        $variable['producto_id']=$producto_id;
                        $precio =$hojaActual->getCellByColumnAndRow(6, $indiceFila);
                        $variable['precio']=$precio;
                        $indice=$indice++;
                        $array = array(
                            "codigo" => "$codigo",
                            "nombre" => "$nombre",
                            "voltaje_id" => $voltaje_id,
                            "color_id" => $color_id,
                            "producto_id" => $producto_id,
                            "precio" => $precio
                        );
                       
                        $this->productoSisModel->newProductSystem($variable);
                    }
                    $productoSistema = $this->productoSisModel->getAll();
                    require 'views/Admin/productoSis/index.php';
                }
            } else {
    
            }
        }
    }
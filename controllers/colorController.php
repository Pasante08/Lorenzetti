<?php

require 'models/color.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class colorController
{
    private $colorModel;

    public function __construct()
    {
        $this->colorModel = new Color;
        $this->spreadsheet = new Spreadsheet;
    }

    public function Index()
    {
        $colores = $this->colorModel->getAll();
        //require 'views/index.php';
    }

    public function adminIndex()
    {
        require 'views/Admin/templates/header.php';
        require 'views/Admin/color/addColor.php';
    }

    //METODO TEMPORAL PARA AGREGAR COLORES
    public function addColor()
    {
        require 'views/Admin/templates/header.php';
        require 'views/Admin/color/addColors.php';
    }

    public function addColorProducto()
    {
        if(empty($_REQUEST['file'])) {
            $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
            if(in_array($_FILES["file"]["type"],$allowedFileType)){
                $targetPath = 'files/'.$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                $Reader = IOFactory::load($targetPath);
                $totalHojas = $Reader->getSheetCount();
                $hojaActual =$Reader->getSheet(0);
                $numeroFilas = $hojaActual->getHighestDataRow();
                for($indiceFila = 1; $indiceFila<=$numeroFilas; $indiceFila++) {
                    $producto_id = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
                    $color_id = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                    $imagen = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
                    $ubicacion = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
                    $array = array(
                        "producto_id" => "$producto_id", 
                        "color_id" => "$color_id", 
                        "imagen" => "$imagen",
                        "ubicacion" => "$ubicacion"
                    );
                    $this->colorModel->newColorProducto($array);
                }
                $productos = $this->colorModel->getAll();
                require 'views/index.php';
            }
        } else {

        }
    }

    public function addColors()
    {
        if(empty($_REQUEST['file'])) {
            $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
            if(in_array($_FILES["file"]["type"],$allowedFileType)){
                $targetPath = 'files/'.$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                $Reader = IOFactory::load($targetPath);
                $totalHojas = $Reader->getSheetCount();
                $hojaActual =$Reader->getSheet(0);
                $numeroFilas = $hojaActual->getHighestDataRow();
                for($indiceFila = 1; $indiceFila<=$numeroFilas; $indiceFila++) {
                    $nombre = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
                    $array = array(
                        "nombre" => "$nombre", 
                    );
                    $this->colorModel->newColor($array);
                }
                $productos = $this->colorModel->getAll();
                require 'views/index.php';
            }
        } else {

        }
    }
}
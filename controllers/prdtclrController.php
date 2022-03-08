<?php

require 'models/prdtclr.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class prdtclrController
{
    private $prdtclrModel;

    public function __construct()
    {
        $this->prdtclrModel = new prdtclr;
        $this->spreadsheet = new Spreadsheet;
    }

    public function Index()
    {
        //$productos = $this->prdtclrModel->getAll();
        require 'views/index.php';
    }

    public function addprdtclr()
    {
        require 'views/Admin/templates/header.php';
        require 'views/Admin/prdtclr/addprdtclr.php';
    }

    public function addVoltajeProducto()
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
                    $voltaje_id = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                    $array = array(
                        "producto_id" => "$producto_id", 
                        "voltaje_id" => "$voltaje_id"
                    );
                    $this->prdtclrModel->newVoltajeProducto($array);
                }
                $productos = $this->prdtclrModel->getAll();
                require 'views/Admin/templates/header.php';
                require 'views/Admin/prdtclr/addprdtclr.php';
            }
        } else {

        }
    }
}
<?php

require 'models/prdtclr.php';
require 'models/voltaje.php';
require 'models/producto.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class prdtclrController
{
    private $prdtclrModel;

    public function __construct()
    {
        $this->prdtclrModel = new prdtclr;
        $this->voltajeModel = new Voltaje;
        $this->productoModel = new Producto;
        $this->spreadsheet = new Spreadsheet;
    }

    public function Index()
    {
        //$productos = $this->prdtclrModel->getAll();
        require 'views/index.php';
    }

    public function addprdtclr()
    {
        $producto_voltaje = $this->prdtclrModel->getAll();
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

    public function editPV()
    {
        if(isset($_REQUEST['id']))
        {
            $producto_voltaje = $this->prdtclrModel->getById($_REQUEST['id']);
            $productos = $this->productoModel->getAll();
            $voltajes = $this->voltajeModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/prdtclr/editPV.php';
        } else {
            echo 'No se encontro el ID';
        } 
    }

    public function update()
    {
        if(isset($_POST)) {
            $this->prdtclrModel->editPV($_POST);
            $productos = $this->productoModel->getAll();
            $voltajes = $this->voltajeModel->getAll();
            $producto_voltaje = $this->prdtclrModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/prdtclr/addprdtclr.php';
        } else {
            echo "Error, accion no permitida";
        }
    }

    public function updateStatus()
    {
        if(isset($_REQUEST)) {
            $data['idProductoVoltaje'] = $_REQUEST['id'];
            $data['estado'] = $_REQUEST['S'];
            $this->prdtclrModel->updatePC($data);
            $producto_voltaje = $this->prdtclrModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/prdtclr/addprdtclr.php';
        }
    }
}
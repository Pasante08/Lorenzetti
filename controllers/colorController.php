<?php

require 'models/color.php';
require 'models/productosColor.php';
require 'models/producto.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class colorController
{
    private $colorModel;

    public function __construct()
    {
        $this->colorModel = new Color;
        $this->productoColor = new ProductoColor;
        $this->productoModel = new Producto;
        $this->spreadsheet = new Spreadsheet;
    }

    public function Index()
    {
        $colores = $this->colorModel->getAll();
        //require 'views/index.php';
    }

    public function adminIndex()
    {
        $producto_color = $this->productoColor->getAll();
        require 'views/Admin/templates/header.php';
        require 'views/Admin/color/addColor.php';
    }

    //METODO TEMPORAL PARA AGREGAR COLORES
    public function addColor()
    {
        $color = $this->colorModel->getAll();
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
                    $imgxcien = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
                    $array = array(
                        "producto_id" => "$producto_id", 
                        "color_id" => "$color_id", 
                        "imagen" => "$imagen",
                        "ubicacion" => "$ubicacion",
                        "imgxcien" => "$imgxcien"
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
                    $imgColor = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                    $array = array(
                        "nombre" => "$nombre",
                        "imgColor" => "$imgColor"
                    );
                    $this->colorModel->newColor($array);
                }
                $productos = $this->colorModel->getAll();
                require 'views/index.php';
            }
        } else {

        }
    }

    public function editPC()
    {
        if(isset($_REQUEST['id']))
        {
            $producto_color = $this->productoColor->getById($_REQUEST['id']);
            $productos = $this->productoModel->getAll();
            $colores = $this->colorModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/color/editPC.php';
        } else {
            echo 'No se encontro el ID';
        }
    }

    public function update()
    {
        if(isset($_POST)) {
            $this->productoColor->editPC($_POST);
            $productos = $this->productoModel->getAll();
            $colores = $this->colorModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/color/addColor.php';
        } else {
            echo "Error, accion no permitida";
        }
    }

    //Metodo para actualizar estado de un productoColor
    public function updateStatus()
    {
        if(isset($_REQUEST)) {
            $data['idProductoColor'] = $_REQUEST['id'];
            $data['estado'] = $_REQUEST['S'];
            $this->productoColor->updatePC($data);
            $producto_color = $this->productoColor->getAll();
            //print_R($producto_color);
            //die();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/color/addColor.php';
        }
    }
}
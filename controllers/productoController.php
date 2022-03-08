<?php

require 'models/producto.php';
require 'models/categoria.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class productoController
{
    private $productoModel;

    public function __construct()
    {
        $this->productoModel = new Producto;
        $this->spreadsheet = new Spreadsheet;
        $this->categoriaModel = new Categoria;
    }

    public function Index()
    {
        $productos = $this->productoModel->getAll();
        require 'views/index.php';
    }

    public function adminIndex()
    {
        $productos = $this->productoModel->getAll();
        require 'views/Admin/templates/header.php';
        require 'views/Admin/producto/addProduct.php';
    }

    public function edit()
    {
        if(isset($_REQUEST['id']))
        {
            $producto = $this->productoModel->getById($_REQUEST['id']);
            $categorias = $this->categoriaModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/producto/edit.php';
        }
    }

    public function update()
    {
        if (isset($_POST)) {
            $this->productoModel->editProducto($_POST);
            $productos = $this->productoModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/producto/addProduct.php';
        } else {
            echo "Error, accion no permitida";
        }
    }

    public function search()
    {
        if(isset($_REQUEST['name'])) {
            $nWords = explode(" ",$_REQUEST['name']);
            $number = count($nWords);
            if($number == 1) {
                if($_REQUEST['cat'] != null) {
                    $products = $this->productoModel->searchProductByCat(true, $_REQUEST['name'], $_REQUEST['cat']);
                    require 'views/products.php';
                } else {
                    $products = $this->productoModel->searchProducts(true, $_REQUEST['name']);
                    require 'views/products.php';
                }
            } else {
                if($_REQUEST['cat'] != null) {
                    $products = $this->productoModel->searchProductByCat(false, $_REQUEST['name'], $_REQUEST['cat']);
                    require 'views/products.php';
                } else {
                    $products = $this->productoModel->searchProducts(false, $_REQUEST['name']);
                    require 'views/products.php';
                }
            }
        } else {
            echo "Error, no se puede realizar la consulta";
        }
    }

    public function addExcel()
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
                    $precio = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                    $imagen = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
                    $ubicacion = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
                    $categoria_id = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
                    $estado = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
                    $voltaje = $hojaActual->getCellByColumnAndRow(7, $indiceFila);
                    $color = $hojaActual->getCellByColumnAndRow(8, $indiceFila);
                    $array = array(
                        "nombre" => "$nombre", 
                        "precio" => $precio,
                        "imagen" => "$imagen",
                        "ubicacion" => "$ubicacion",
                        "categoria_id" => "$categoria_id",
                        "estado" => "$estado",
                        "voltaje" => "$voltaje",
                        "color" => "$color"
                    );
                    /*print_r($array);
                    die();*/
                    $this->productoModel->newProduct($array);
                }
                $productos = $this->productoModel->getAll();
                require 'views/index.php';
            }
        } else {

        }
    }

    public function productView()
    {
        if(isset($_REQUEST['id'])) {
            $product = $this->productoModel->getById($_REQUEST['id']);
            require 'views/ajax/product-quick-view.php';
        } else {
            
        }
    }

    public function viewProduct()
    {        
        if(isset($_GET['id'])) {
            $product = $this->productoModel->getById($_GET['id']);
            if($product[0]->color != null) {
                $colores = $this->productoModel->filtros($_GET['id'], 'color');
            }
            if($product[0]->voltaje != null) {
                $voltajes = $this->productoModel->filtros($_GET['id'], 'voltaje');
            }
            $productos = $this->productoModel->productLimit($product[0]->categoria_id);
            require 'views/product.php';
        }
    }
}
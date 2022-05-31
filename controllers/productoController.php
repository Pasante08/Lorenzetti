 <?php

require 'models/producto.php';
require 'models/categoria.php';
require 'models/productosColor.php';
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
        $this->prdtColorModel = new ProductoColor;
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

    public function getAll()
    {
        $products = $this->productoModel->getAll();
        require 'views/products.php';
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

    public function categories()
    {
        if(isset($_REQUEST['id'])) {
            $products = $this->productoModel->productsByCat($_REQUEST['id']);
            require 'views/products.php';
        } else {
            echo "Operacion incorrecta, categoria no disponible";
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

    public function filterCategory()
    {
        if(isset($_POST['id'])) {
            $products = $this->productoModel->productsByCat($_POST['id']);
            print_r( json_encode ( $products ) );
        } else {
            echo "Error, no se puede realizar el filtro";
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
                    $descripcion = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                    $precio = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
                    $preciosi = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
                    $imagen = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
                    $ubicacion = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
                    $imgxcien = $hojaActual->getCellByColumnAndRow(7, $indiceFila);
                    $categoria_id = $hojaActual->getCellByColumnAndRow(8, $indiceFila);
                    $estado = $hojaActual->getCellByColumnAndRow(9, $indiceFila);
                    $voltaje = $hojaActual->getCellByColumnAndRow(10, $indiceFila);
                    $color = $hojaActual->getCellByColumnAndRow(11, $indiceFila);
                    $array = array(
                        "nombre" => "$nombre",
                        "descripcion" => "$descripcion",
                        "precio" => $precio,
                        "precioSI" => $preciosi,
                        "imagen" => "$imagen",
                        "ubicacion" => "$ubicacion",
                        "imgxcien" => "$imgxcien",
                        "categoria_id" => $categoria_id,
                        "estado" => "$estado",
                        "voltaje" => "$voltaje",
                        "color" => "$color"
                    );
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
            /*$product = $this->productoModel->getById($_REQUEST['id']);
            if($product[0]->voltaje != null) {
                $voltajes = $this->productoModel->filtros($_REQUEST['id'], 'voltaje');
            }
            if($product[0]->color != null) {
                $colores = $this->productoModel->filtros($_REQUEST['id'], 'color');
            }*/
            /*print_R($colores);
            die();*/
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
            $productosColor = $this->prdtColorModel->getById($_GET['id']);
            $productos = $this->productoModel->productLimit($product[0]->categoria_id);
            require 'views/product.php';
        }
    }

    public function services()
    {
        require 'views/services.php';
    }

    public function contact()
    {
        require 'views/contact.php';
    }

    public function aboutUs()
    {
        require 'views/about.php';
    }
}
<?php

require 'models/productoSistema.php';
require 'models/productosColor.php';
require 'models/color.php';
require 'models/voltaje.php';
require 'models/producto.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class productoSisController
{
    private $productoSisModel;

    public function __construct()
    {
        $this->productoSisModel = new productoSistema;
        $this->prdtColorModel = new ProductoColor;
        $this->colorModel = new Color;
        $this->voltajeModel = new Voltaje;
        $this->productoModel = new Producto;
    }

    public function adminIndex()
    {
        $productos = $this->productoSisModel->getAll();
        require 'views/Admin/templates/header.php';
        require 'views/Admin/productoSis/addProductSis.php';
    }

    public function addExcel()
    {
        if (empty($_REQUEST['file'])) {
            $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
            if (in_array($_FILES["file"]["type"], $allowedFileType)) {
                $targetPath = 'files/' . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                $Reader = IOFactory::load($targetPath);
                $totalHojas = $Reader->getSheetCount();
                $hojaActual = $Reader->getSheet(0);
                $numeroFilas = $hojaActual->getHighestDataRow();
                $variable = array();
                for ($indiceFila = 1; $indiceFila <= $numeroFilas; $indiceFila++) {
                    $indice = 0;
                    $codigo = "";
                    $codigo = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
                    $variable['codigo'] = $codigo;
                    $nombre = "";
                    $nombre = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                    $variable['nombre'] = $nombre;
                    $voltaje_id = "";
                    $voltaje_id = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
                    if (empty($voltaje_id)) {
                        $voltaje_id = 0;
                    }
                    $variable['voltaje_id'] = $voltaje_id;
                    $color_id = "";
                    $color_id = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
                    if (empty($color_id)) {
                        $color_id = 0;
                    }
                    $variable['color_id'] = $color_id;
                    $producto_id = $hojaActual->getCellByColumnAndRow(5, $indiceFila);
                    if (empty($producto_id)) {
                        $producto_id = 0;
                    }
                    $variable['producto_id'] = $producto_id;
                    $precio = $hojaActual->getCellByColumnAndRow(6, $indiceFila);
                    $variable['precio'] = $precio;
                    $indice = $indice++;
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

    public function newProduct()
    {
        $voltajes = $this->voltajeModel->getAll();
        $colores = $this->colorModel->getAll();
        $productos = $this->productoModel->getAll();
        require 'views/Admin/templates/header.php';
        require 'views/Admin/productoSis/new.php';
    }

    public function save()
    {
        $this->productoSisModel->newProductSystem($_POST);
		header('Location: ?controller=productosis');
    }

    public function edit()
    {
        if (isset($_REQUEST['id'])) {
            $productoSis = $this->productoSisModel->getByIdAdmin($_REQUEST['id']);
            $voltajes = $this->voltajeModel->getAll();
            $colores = $this->colorModel->getAll();
            $productos = $this->productoModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/productoSis/edit.php';
        }
    }

    public function update()
    {
        if (isset($_POST)) {
            $this->productoSisModel->editProductoSis($_POST);
            $productos = $this->productoSisModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/productoSis/addProductSis.php';
        } else {
            echo "Error, accion no permitida";
        }
    }

    public function updateStatus()
    {
        if (isset($_REQUEST)) {
            $this->productoSisModel->updateStatus($_REQUEST['id'], $_REQUEST['S']);
            $productos = $this->productoSisModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/productoSis/addProductSis.php';
        }
    }

    //Metodo para traer los colores asociados a los voltajes
    public function colors_voltage()
    {
        if (isset($_REQUEST)) {
            $colores = $this->productoSisModel->colorsByVoltage($_REQUEST['id'], $_REQUEST['idV']);
            $productosColor = $this->prdtColorModel->getById($_REQUEST['id']);
            $resArray = array('items' => $colores, 'productos' => $productosColor);
            echo json_encode($resArray);
        } else {
            print("No se envio nada");
            die();
        }
    }

    //Buscar producto por codigo SAP
    public function searchCod()
    {
        if (isset($_POST)) {
            $productos = $this->productoSisModel->searchCodigo($_POST['cod']);
            $html = '';
            foreach ($productos as $producto) {
                $html .= '<tr>';
                $html .= '<td>' . $producto->idProducto . '</td>';
                $html .= '<td>' . $producto->codigo . '</td>';
                $html .= '<td>' . $producto->nombre . '</td>';
                $html .= '<td>' . $producto->voltaje_id . '</td>';
                $html .= '<td>' . $producto->color_id . '</td>';
                $html .= '<td>' . $producto->producto_id . '</td>';
                if ($producto->estado) {
                    $html .= '<td><span style="color:green">Activo</span></td>';
                } else {
                    $html .= '<td><span style="color:red">Inactivo</span></td>';
                }
                $html .= '<td> 
                    <a href="?controller=productosis&method=edit&id=' . $producto->idProducto . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
                if ($producto->estado) {
                    $html .= '<a class="btn btn-success" href="?controller=productosis&method=updateStatus&id=' . $producto->idProducto . '&S=' . $producto->estado . '"><i class="fas fa-lock-open"></i></a>';
                } else {
                    $html .= '<a class="btn btn-danger" href="?controller=productosis&method=updateStatus&id=' . $producto->idProducto . '&S=' . $producto->estado . '"><i class="fas fa-lock"></i></a>';
                }
                '
                </td>';
                $html .= '</tr>';
            }
            echo json_encode($html, JSON_UNESCAPED_UNICODE);
        } else {
            echo 'No existen datos';
            die();
        }
    }

    public function validateStock()
    {
        if (isset($_REQUEST)) {
            $count = $this->productoSisModel->stockAvailable($_REQUEST['id']);
            if ($_REQUEST['quantity'] <= $count[0]->unidades) {
                $response = false;
            } else {
                $response = true;
            }
            echo $response;
        } else {
            echo 'No existen datos';
            die();
        }
    }
}

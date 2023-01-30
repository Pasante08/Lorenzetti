<?php

require 'models/municipio.php';
require 'models/departamento.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class municipioController
{
    private $municipioModel;

    public function __construct()
    {
        $this->municipioModel = new Municipio;
        $this->departamentoModel = new Departamento;
        $this->spreadsheet = new Spreadsheet;
    }

    public function Index()
    {
        $municipios = $this->municipioModel->getAll();
        require 'views/index.php';
    }

    public function adminIndex()
    {
        $municipios = $this->municipioModel->getAll();
        require 'views/Admin/templates/header.php';
        require 'views/Admin/municipio/addMunicipio.php';
    }

    public function new()
    {
        $departamentos = $this->departamentoModel->getAll();
        require 'views/Admin/templates/header.php';
        require 'views/Admin/municipio/new.php';
    }

    public function save()
    {
        $_POST['nombre'] = strtoupper($_POST['nombre']);
        $this->municipioModel->newMunicipio($_POST);
        header('Location: ?controller=municipio&method=adminIndex');
    }

    public function searchName()
    {
        if (isset($_POST)) {
            $municipios = $this->municipioModel->searchNombre($_POST['name']);
            $html = '';
            foreach ($municipios as $municipio) {
                $html .= '<tr>';
                $html .= '<td>' . $municipio->departamento_id . '</td>';
                $html .= '<td>' . $municipio->codigo . '</td>';
                $html .= '<td>' . $municipio->nombre . '</td>';
                $html .= '<td>' . $municipio->flete . '</td>';
                $html .= '<td> 
                    <a href="?controller=municipio&method=edit&id='. $municipio->idMunicipio .'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                </td>';
                $html .= '</tr>';
            }
            echo json_encode($html, JSON_UNESCAPED_UNICODE);
            }
         else {
            echo 'No existen datos';
            die();
        }
    }

    public function edit()
    {
        if (isset($_REQUEST['id'])) {
            $municipio = $this->municipioModel->getById($_REQUEST['id']);
            $departamentos = $this->departamentoModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/municipio/edit.php';
        }
    }

    public function update()
    {
        if (isset($_POST)) {
            $this->municipioModel->editMunicipio($_POST);
            $municipios = $this->municipioModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/municipio/addMunicipio.php';
        } else {
            echo "Error, accion no permitida";
        }
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
                for ($indiceFila = 1; $indiceFila <= $numeroFilas; $indiceFila++) {
                    $departamento_id = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
                    $codigo = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                    $nombre = $hojaActual->getCellByColumnAndRow(3, $indiceFila);
                    $flete = $hojaActual->getCellByColumnAndRow(4, $indiceFila);
                    $array = array(
                        "departamento_id" => "$departamento_id",
                        "codigo" => "$codigo",
                        "nombre" => "$nombre",
                        "flete" => $flete,
                    );
                    $this->municipioModel->newMunicipio($array);
                }
                $municipios = $this->municipioModel->getAll();
                require 'views/index.php';
            } else {
                echo "Extension incorrecta";
                die();
            }
        } else {
            echo "Error al guardar";
            die();
        }
    }
}

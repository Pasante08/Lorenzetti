<?php

require 'models/departamento.php';
require 'models/municipio.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class departamentoController
{

    private $deparModel;

    public function __construct()
    {
        $this->deparModel = new Departamento;
        $this->munisModel = new Municipio;
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
                    $nombre = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
                    $codigo = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                    $array = array(
                        "nombre" => "$nombre",
                        "codigo" => $codigo,
                    );
                    $this->deparModel->newDepartamento($array);
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

    public function adminIndex()
    {
        $departamentos = $this->deparModel->getAll();
        require 'views/Admin/templates/header.php';
        require 'views/Admin/departamento/index.php';
    }

    public function muniPorDepa()
    {
        if (isset($_POST['id'])) {
            $munis = $this->munisModel->listByDepa($_POST['id']);
            print_r(json_encode($munis));
        } else {
            /*print("No existe");
                die();*/
        }
    }
}

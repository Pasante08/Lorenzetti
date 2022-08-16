<?php

require 'models/municipio.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class municipioController
{
    private $municipioModel;

    public function __construct()
    {
        $this->municipioModel = new Municipio;
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

    public function addExcel()
    {
        if(empty($_REQUEST['file'])) {
            $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
            if(in_array($_FILES["file"]["type"],$allowedFileType)) {
                $targetPath = 'files/'.$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                $Reader = IOFactory::load($targetPath);
                $totalHojas = $Reader->getSheetCount();
                $hojaActual =$Reader->getSheet(0);
                $numeroFilas = $hojaActual->getHighestDataRow();
                for ($indiceFila=1; $indiceFila <= $numeroFilas; $indiceFila++) { 
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
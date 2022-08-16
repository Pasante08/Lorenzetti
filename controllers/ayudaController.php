<?php

require 'models/ayuda.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ayudaController
{
    private $ayudaModel;

    public function __construct()
    {
        $this->ayudaModel = new Ayuda;
        $this->spreadsheet = new Spreadsheet;
    }

    public function Index()
    {
        $helps = $this->ayudaModel->getAll();
        require 'views/Admin/templates/header.php';
        require 'views/Admin/ayuda/Index.php';
    }

    public function adminIndex()
    {
        $helps = $this->ayudaModel->getAll();
        require 'views/Admin/templates/header.php';
        require 'views/Admin/ayuda/Index.php';
    }

    public function ayuda()
    {
        $helps = $this->ayudaModel->getAll();
        require 'views/FAQ.php';
    }

    public function edit()
    {
        if(isset($_REQUEST)){
            print("Existe llamado post");
            $help = $this->ayudaModel->getById($_REQUEST['id']);
            require 'views/Admin/templates/header.php';
            require 'views/Admin/ayuda/edit.php';
        } else {
            print("No existe llamado post");
            die();
        }
    }

    public function update()
    {
        if(isset($_POST)) {
            $this->ayudaModel->edit($_POST);
            $helps = $this->ayudaModel->getAll();
            require 'views/Admin/templates/header.php';
            require 'views/Admin/ayuda/Index.php';
        } else {
            echo "Error, accion no permitida";
        }
    }

    public function addExcel()
    {
        if(empty($_REQUEST['file'])) {
            $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
            if(in_array($_FILES['file']["type"],$allowedFileType)){
                $targetPath = 'files/'.$_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
                $Reader = IOFactory::load($targetPath);
                $totalHojas = $Reader->getSheetCount();
                $hojaActual =$Reader->getSheet(0);
                $numeroFilas = $hojaActual->getHighestDataRow();
                for ($indiceFila = 1; $indiceFila<=$numeroFilas; $indiceFila++) { 
                    $question = $hojaActual->getCellByColumnAndRow(1, $indiceFila);
                    $answer = $hojaActual->getCellByColumnAndRow(2, $indiceFila);
                    $array = array(
                        "question" => "$question",
                        "answer" => "$answer",
                    );
                    $this->ayudaModel->newAyuda($array);
                }
                $helps = $this->ayudaModel->getAll();
                require 'views/Admin/templates/header.php';
                require 'views/Admin/ayuda/index.php';
            }
        }
    }


}
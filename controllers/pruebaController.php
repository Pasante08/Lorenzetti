<?php

class pruebaController
{
    private $pruebaModel;

    public function __construct()
    {
    }

    public function pago()
    {
        //$data = json_decode(file_get_contents('php://input'), true);
        echo http_response_code(200);
    }
}

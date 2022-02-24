<?php

require 'models/producto.php';

class productoController
{
    private $productoModel;

    public function __construct()
    {
        $this->productoModel = new Producto;
    }

    public function Index()
    {
        require 'views/index.php';
    }
}
<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use App\Propiedad;
use App\Vendedor;

$propiedad = new Propiedad;
$vendedor = new Vendedor;

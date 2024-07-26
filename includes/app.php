<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use App\Propiedad;
use App\Vendedor;

// Concectarse a la BD
$db = conectarDB();

Propiedad::setDB($db);
Vendedor::setDB($db);

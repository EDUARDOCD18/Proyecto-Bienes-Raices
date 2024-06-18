<?php
/* -- Importar la Base de Datos -- */
require 'includes/config/database.php';
$db = conectarDB();

/* -- Crear email y password-- */
$email = "correo@correo.com";
$password = "12345";

/* -- query para crear el usuario -- */
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$password');";

/* --  Agregar a la Base de Datos -- */
mysqli_query($db, $query);

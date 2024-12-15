<?php
/* -- Importar la Base de Datos -- */
$db = conectarDB();

/* -- Crear email y password-- */
$email = "correo@correo.com";
$password = "12345";

// Hashar el password
$passwordHash = password_hash($password, PASSWORD_BCRYPT);


/* -- query para crear el usuario -- */
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";

/* --  Agregar a la Base de Datos -- */
mysqli_query($db, $query);

<?php
function conectarDB(): mysqli
{
    $db = mysqli_connect('localhost:3306', 'root', '', 'bienesraices_crud');
    return $db;
}

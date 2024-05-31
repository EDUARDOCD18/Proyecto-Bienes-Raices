<?php
function conectarDB(): mysqli
{
    $db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');
    return $db;
}

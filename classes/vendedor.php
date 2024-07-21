<?php

namespace App;

class Vendedor
{
    // Base de datos
    protected static $db;

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? 'No ID';
        $this->nombre = $args['nombre'] ?? 'No Name';
        $this->apellido = $args['apellido'] ?? 'No Last Name';
        $this->telefono = $args['telefono'] ?? 'No Phone Number';
    }

    public function guardar()
    {
        /* Insertar en la Base de Datos */
        $query = " INSERT INTO vendedores (nombre, apellido, telefono ) VALUES ( '$this->nombre', '$this->apellido', '$this->telefono') ";

        $resultado = self::$db->query($query);

        debuguear($resultado);
    }

    // Definir la conección a la base de datos
    public static function setDB($database)
    {
        self::$db = $database;
    }
}

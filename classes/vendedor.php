<?php

namespace App;

class Vendedor
{
    // Base de datos
    protected static $db;
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    // Definir la conexión a la BD
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? 'No ID';
        $this->nombre = $args['nombre'] ?? 'No Name';
        $this->apellido = $args['apellido'] ?? 'No Last Name';
        $this->telefono = $args['telefono'] ?? 'No Phone Number';
    }

    public function guardar()
    {
        $atributos = $this->sanitizarAtributos();
        /* debuguear($atributos); */

        /* Insertar en la Base de Datos */
        $query = " INSERT INTO vendedores (nombre, apellido, telefono ) VALUES ( '$this->nombre', '$this->apellido', '$this->telefono') ";


        $resultado = self::$db->query($query);

        debuguear($resultado);
    }

    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    //Sanitizar
    public  function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
}

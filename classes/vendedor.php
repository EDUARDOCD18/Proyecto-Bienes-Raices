<?php

namespace App;

/* CLASE VENDEDOR */

class Vendedor
{
    // Base de datos
    protected static $db;
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    /* ERRORES */
    protected static $errores = [];

    /* ATRIBUTOS DE LA CLASE VENDEDOR */
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    // Definir la conexión a la BD
    public static function setDB($database)
    {
        self::$db = $database;
    }

    /* CONSTRUCTOR */
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? 'No ID';
        $this->nombre = $args['nombre'] ?? 'No Name';
        $this->apellido = $args['apellido'] ?? 'No Last Name';
        $this->telefono = $args['telefono'] ?? 'No Phone Number';
    }

    /* MÉTODO PARA GUARDAR EN LA BD */
    public function guardar()
    {
        $atributos = $this->sanitizarAtributos();
        /* debuguear($atributos); */

        /* Insertar en la Base de Datos */
        $query = " INSERT INTO vendedores (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= " ')";

        $resultado = self::$db->query($query);

        debuguear($resultado);
    }

    /* MÉTODO PARA OBTENER LOS ATRIBUTOS */
    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    /* MÉTODO PARA SINITZAR */
    public  function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    /* MÉTODO PARA VALIDACIÓN */
    public static function getErrores()
    {
        return self::$errores;
    }

    public function validar()
    {
        /* Validaciones para los campos vacíos */
        if (!$this->nombre) {
            self::$errores[] = "Campo Nombre no puede ir vacío.";
        }
        if (!$this->apellido) {
            self::$errores[] = "Campo Apellido no puede ir vacío.";
        }
        if (!$this->telefono) {
            self::$errores[] = "Campo Teléfono no puede ir vacío.";
        }

        return self::$errores;
    }

    // Lista para todas las propiedades
    public static function all()
    {
        $resultado = $query = "SELECT * FROM vendedores";
        self::consultarSQL($query);

        return $resultado;
    }

    public static function consultarSQL($query)
    {
        // Consultar SQL
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $arry[] = static::crearObjeto($registro);
        }

        // Liberar memoria
        $resultado->free();

        // Retornar los resultados
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new self;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }
}

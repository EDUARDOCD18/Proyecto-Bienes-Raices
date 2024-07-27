<?php

namespace App;

/* CLASE PROPIEDAD */

class Propiedad
{
    /* -- Base de Datos -- */
    protected static $db;

    /* -- Errores -- */
    protected static $errores = [];

    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id']; // Columnas de la BD

    /* -- Atributos -- */
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    /* -- Definir la conección a la base de datos -- */
    public static function setDB($database)
    {
        self::$db = $database;
    }

    /* -- Constructor -- */
    public function __construct($args = [])
    {
        // Sanitizar los datos
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    /* -- Función para guardar en la BD-- */
    public function guardar()
    {
        $atributos = $this->sanitizarAtributos();

        /* Insertar en la Base de Datos */
        $query = " INSERT INTO propiedades (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= " ')";

        $resultado = self::$db->query($query);

        debuguear($resultado);
    }

    /* -- Función para obtener los atributos -- */
    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    /* -- Función para sanitizar -- */
    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    /* -- Validación -- */
    public static function getErrores()
    {
        return self::$errores;
    }

    public function validar()
    {
        // Asignar una variable a files
        $this->imagen = $_FILES['imagen'];

        /* Validaciones para los campos vacíos */
        if (!$this->titulo) {
            self::$errores[] = "Debe agregar un título.";
        }

        if (!$this->precio) {
            self::$errores[] = "Debe agregar un precio de venta.";
        }
        if (!$this->imagen['name'] || $this->imagen['error']) {
            self::$errores[] = "La imagen es obligatoria.";
        }
        // Validar el tamaño de la imagen
        $medida = 1000 * 1000;
        if ($this->imagen['size'] > $medida) {
            self::$errores[] = "La imagene es muy pesada.";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "Debe agregar una descripción o esta es muy corta. 50 Caracteres mínimo.";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debe agregar mínimo una habitación.";
        }
        if (!$this->wc) {
            self::$errores[] = "Debe agregar mínimo un baño.";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "Debe agregar mínimo un puesto de estacionamiento.";
        }
        if (!$this->vendedores_id) {
            self::$errores[] = "Debe elegir al vendedor o vendedora.";
        }

        return self::$errores;
    }
}

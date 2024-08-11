<?php

namespace App;

/* CLASE PROPIEDAD */

class Propiedad
{
    /* -- Base de Datos -- */
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id']; // Columnas de la BD

    /* -- Errores -- */
    protected static $errores = [];

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
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? 5;
    }

    public function guardar()
    {
        if (isset($this->id)) {
            // Actualizar
            $this->actualizar();
        } else {
            // Creando registro
            $this->crear();
        }
    }

    /* -- Método para guardar en la BD-- */
    public function crear()
    {
        $atributos = $this->sanitizarAtributos();

        /* Insertar en la Base de Datos */
        $query = " INSERT INTO propiedades (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= " ')";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function actualizar()
    {
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = " UPDATE propiedades SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);


        if ($resultado) {
            // Redirecionar al usuario
            header('Location: ../propiedades?resultado=2');
        }
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

    // Subida de archivos
    public function setImage($imagen)
    {
        // Elimina la imagen anterior
        if (isset($this->id)) {
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if ($existeArchivo) {
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }

        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    /* -- Validación -- */
    public static function getErrores()
    {
        return self::$errores;
    }

    public function validar()
    {
        /* Validaciones para los campos vacíos */
        if (!$this->titulo) {
            self::$errores[] = "Debe agregar un título.";
        }
        if (!$this->precio) {
            self::$errores[] = "Debe agregar un precio de venta.";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria.";
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

    // Lista todas los registros
    public static function all()
    {
        $query = "SELECT * FROM propiedades";
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM propiedades WHERE id = $id";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        // Consultar BD
        $resultado = self::$db->query($query);

        // Iterar los datos
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
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

    // Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sinc($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key)  && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}

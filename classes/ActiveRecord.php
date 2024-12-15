<?php

namespace App;

class ActiveRecord
{
    /* -- Base de Datos -- */
    protected static $db;
    protected static $columnasDB = []; // Columnas de la BD
    protected static $tabla = '';

    /* -- Errores -- */
    protected static $errores = [];


    /* -- Definir la conección a la base de datos -- */
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
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
        $query = " INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= " ')";

        $resultado = self::$db->query($query);

        if ($resultado) {
            // Redirecionar al usuario
            header('Location: ../../admin?resultado=1');
        }
    }

    public function actualizar()
    {
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = " UPDATE " . static::$tabla . " SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);


        if ($resultado) {
            // Redirecionar al usuario
            header('Location: ../../admin?resultado=2');
        }
    }

    /* -- Eliminar registros -- */
    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borrarImagenes();
            // Redirecionar al usuario
            header('Location: ../admin?resultado=3');
        }
    }

    /* -- Función para obtener los atributos -- */
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
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
        if (!is_null($this->id)) {
            $this->borrarImagenes();
        }

        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    /* -- Borrar imágens -- */
    public function borrarImagenes()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    /* -- Validación -- */
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        /* Validaciones para los campos vacíos */
        static::$errores = [];
        return static::$errores;
    }

    // Lista todas los registros
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Obtiene determinado número de registros
    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
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
        $objeto = new static;

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

<?php

namespace App;

/* CLASE VENDEDOR */

class Vendedor extends ActiveRecord
{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    /* ATRIBUTOS DE LA CLASE VENDEDOR */
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    /* CONSTRUCTOR */
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar()
    {
        /* Validaciones para los campos vacíos */
        if (!$this->nombre) {
            self::$errores[] = "Debe agregar el nombre.";
        }
        if (!$this->apellido) {
            self::$errores[] = "Debe agregar el apellido.";
        }
        if (!$this->telefono) {
            self::$errores[] = "Debe agregar el número.";
        }

        if (!preg_match('/[0-9]{10}/', $this->telefono)) {
            self::$errores[] = "Formato no válido.";
        }
        return self::$errores;
    }
}

// class Vendedor
// {
//     // Base de datos
//     protected static $db;
//     protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

//     /* ERRORES */
//     protected static $errores = [];

//  

//     // Definir la conexión a la BD
//     public static function setDB($database)
//     {
//         self::$db = $database;
//     }

//     /* CONSTRUCTOR */
//     public function __construct($args = [])
//     {
//         $this->id = $args['id'] ?? null;
//         $this->nombre = $args['nombre'] ?? '';
//         $this->apellido = $args['apellido'] ?? '';
//         $this->telefono = $args['telefono'] ?? '';
//     }

//     /* MÉTODO PARA GUARDAR EN LA BD */
//     public function guardar()
//     {
//         if (!is_null($this->id)) {
//             // Actualizar
//             $this->actualizar();
//         } else {
//             // Creando registro
//             $this->crear();
//         }
//     }

//     /* MÉTODO PARA CREAR REGISTRO */
//     public function crear()
//     {
//         $atributos = $this->sanitizarAtributos();
//         /* debuguear($atributos); */

//         /* Insertar en la Base de Datos */
//         $query = " INSERT INTO vendedores (";
//         $query .= join(', ', array_keys($atributos));
//         $query .= " ) VALUES ('";
//         $query .= join("', '", array_values($atributos));
//         $query .= " ')";


//         $resultado = self::$db->query($query);

//         if ($resultado) {
//             // Redirecionar al usuario
//             header('Location: ../vendedores?resultado=1');
//         }
//     }

//     /* MÉTODO PARA ACTUALIZAR REGISTRO */
//     public function actualizar()
//     {
//         $atributos = $this->sanitizarAtributos();

//         $valores = [];
//         foreach ($atributos as $key => $value) {
//             $valores[] = "{$key}='{$value}'";
//         }

//         $query = " UPDATE vendedores SET ";
//         $query .=  join(', ', $valores);
//         $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
//         $query .= " LIMIT 1 ";

//         $resultado = self::$db->query($query);
        

//         if ($resultado) {
//             // Redirecionar al usuario
//             header('Location: ../vendedores?resultado=2');
//         }
//     }

//     /* MÉTODO PARA OBTENER LOS ATRIBUTOS */
//     public function atributos()
//     {
//         $atributos = [];
//         foreach (self::$columnasDB as $columna) {
//             if ($columna === 'id') continue;
//             $atributos[$columna] = $this->$columna;
//         }
//         return $atributos;
//     }

//     /* MÉTODO PARA SINITZAR */
//     public  function sanitizarAtributos()
//     {
//         $atributos = $this->atributos();
//         $sanitizado = [];

//         foreach ($atributos as $key => $value) {
//             $sanitizado[$key] = self::$db->escape_string($value);
//         }
//         return $sanitizado;
//     }

//     /* MÉTODO PARA VALIDACIÓN */
//     public static function getErrores()
//     {
//         return self::$errores;
//     }

//     public function validar()
//     {
//         /* Validaciones para los campos vacíos */
//         if (!$this->nombre) {
//             self::$errores[] = "Campo Nombre no puede ir vacío.";
//         }
//         if (!$this->apellido) {
//             self::$errores[] = "Campo Apellido no puede ir vacío.";
//         }
//         if (!$this->telefono) {
//             self::$errores[] = "Campo Teléfono no puede ir vacío.";
//         }

//         return self::$errores;
//     }

//     // Lista para todos los registros
//     public static function all()
//     {
//         $query = "SELECT * FROM vendedores";
//         $resultado = self::consultarSQL($query);

//         return $resultado;
//     }

//     // Buscar un registro por su id
//     public static function find($id)
//     {
//         $query = "SELECT * FROM vendedores WHERE id = $id";
//         $resultado = self::consultarSQL($query);

//         return array_shift($resultado);
//     }

//     public static function consultarSQL($query)
//     {
//         // Consultar SQL
//         $resultado = self::$db->query($query);

//         // Iterar los resultados
//         $array = [];
//         while ($registro = $resultado->fetch_assoc()) {
//             $array[] = static::crearObjeto($registro);
//         }

//         // Liberar memoria
//         $resultado->free();

//         // Retornar los resultados
//         return $array;
//     }

//     protected static function crearObjeto($registro)
//     {
//         $objeto = new self;

//         foreach ($registro as $key => $value) {
//             if (property_exists($objeto, $key)) {
//                 $objeto->$key = $value;
//             }
//         }

//         return $objeto;
//     }

//     // Sincroniza el objeto en memoria con los cambios realizados por el usuario
//     public function sinc($args = [])
//     {
//         foreach ($args as $key => $value) {
//             if (property_exists($this, $key) && !is_null($value)) {
//                 $this->$key = $value;
//             }
//         }
//     }
// }

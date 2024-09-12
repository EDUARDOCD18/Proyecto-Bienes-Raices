<?php

namespace App;

/* CLASE PROPIEDAD */

class Propiedad extends ActiveRecord
{
    protected static $tabla = 'propiedades';
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

    /* -- Cpnstructor -- */
    public function __construct($args = [])
    {
        // Sanitizar los datos
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
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
}

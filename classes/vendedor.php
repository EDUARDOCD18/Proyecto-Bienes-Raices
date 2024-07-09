<?php

namespace App;

class Vendedor
{

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
}

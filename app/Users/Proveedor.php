<?php

namespace App\Users;


class Proveedor implements UserInterface {
    private $nombre;
    private $direccion;
    private $telefono;

    public function __construct($nombre, $direccion, $telefono) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    public function create() {
        return "Proveedor creado";
    }
}
<?php

namespace App\Users;

class UserFactory {
    public static function make($type) {
        switch($type) {
            case 'admin':
                return new Admin("Admin", "Xela", "46131012");
            case 'cliente':
                return new Cliente("Cliente", "Xela", "46131012");
            case 'proveedor':
                return new Proveedor("Proveedor", "Xela", "46131012");
            default:
                throw new \Exception("Tipo de usuario no válido");
        }
    }
}

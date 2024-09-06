<?php

namespace App\Http\Controllers;

use App\Users\UserFactory;

class UserController extends Controller {
    public function createUser($type) {
        $user = UserFactory::make($type);
        $user->create();
    }
}

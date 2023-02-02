<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class GetProfileController extends Controller
{
    public function __invoke(User $user) {
        return response([
            "success" => true,
            "message" => "OK",
            "user"    => $user
        ]);
    }
}

<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UniquenessCheckController extends Controller
{
    public function __invoke( User $user ) {
        return \response([
            'success' => true,
            'message' => 'User exists'
        ]);
    }
}

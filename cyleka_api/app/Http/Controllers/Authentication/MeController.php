<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeController extends Controller {

    public function __invoke() {

        return \response([
            'success' => true,
            'user'    => auth()->user()
        ], 200);

    }

}

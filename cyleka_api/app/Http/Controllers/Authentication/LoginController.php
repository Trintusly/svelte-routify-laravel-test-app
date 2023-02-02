<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\Site\Security;

class LoginController extends Controller {

    use Security;

    public function __invoke(Request $request) {

        $credentials = $request->only('username', 'password');
        $auth = auth()->attempt($credentials);
        if (!$auth) {
            $this->logSiteAction("login:failed");

            return \response([
                'success' => false,
                'message' => 'Invalid credentials.'
            ], 401);
        }

        $usr = auth()->user();

        $this->logSiteAction("login:success", $usr->id);

        return \response([
            'success' => true,
            'message' => 'Logged in successfully.',
            'user'    => $usr
        ], 200);

    }
}

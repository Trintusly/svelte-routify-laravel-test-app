<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;
use App\Http\Traits\Site\Security;

class RegisterController extends Controller {

    use Security;

    public function __invoke(RegisterRequest $request) {

        $usr = User::create($request->only([ 'username', 'email', 'password' ]));
        
        $this->logSiteAction("register", $usr->id);

        return \response([
            'success' => true,
            'message' => 'Account created successfully!',
            'user'    => $usr
        ], 200);

    }

}

<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\Site\Security;

class LogoutController extends Controller {
    
    use Security;
    
    public function __invoke() {

        $this->logSiteAction("logout", auth()->user()->id);

        auth()->logout();

        return \response([
            'success' => true
        ], 200);

    }

}

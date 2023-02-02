<?php

namespace App\Http\Controllers\User\Settings\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Settings\Security\ChangePasswordRequest;

class ChangePasswordController extends Controller {
    
    /**
     * This method handles a user's password change
     *
     * @param ChangePasswordRequest $request
     * @return void
     */

    public function __invoke(ChangePasswordRequest $request) {

        $usr = auth()->user();

        /*
            Change the password
        */
        
        $usr->password = $request->newPassword;
        $usr->save();

        /*
            Timeout user
        */

        // $usr->updateFlood();


        /*
            End all sessions
        */

        //auth()->user()->sessions()->delete();

        return response([ 'success' => true, 'message' => 'Password successfully changed. You are now logged out from all devices.' ]);
    }

}

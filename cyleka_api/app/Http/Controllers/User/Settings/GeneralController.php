<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\Settings\UpdateBioRequest;

class GeneralController extends Controller
{
    public function updateBio( UpdateBioRequest $request ) {
    
        $usr = auth()->user();

        /*
            Update bio
        */

        $usr->bio = $request->bio;
        $usr->save();

        
        /*
            Timeout user
        */

        //$usr->updateFlood();

        return response([ 'success' => true, 'message' => 'Bio updated successfully.', 'bio' => $usr->bio ]);
        
    }
}

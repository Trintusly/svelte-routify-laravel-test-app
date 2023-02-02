<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Presence {

   public function handle(Request $request, Closure $next) {

        if (auth()->check()) {

            $usr = auth()->user();

            /*
                Update user's last seen if he is still active after 2 minutes
                This will enable the app to not update the last seen every request
            */

            if (Carbon::createFromDate($usr->updated_at)->diffInMinutes() >= 2) {

                $usr->touch();
            }

        }

        return $next($request);

    }

}

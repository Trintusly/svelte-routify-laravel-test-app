<?php

namespace App\Http\Middleware\Site\Security;

use Closure;
use Illuminate\Http\Request;
use App\Models\Misc\SiteAction;
use Carbon\Carbon;
use App\Http\Traits\Site\Security;

class TimeoutMiddleware {

    use Security;

    public function handle(Request $request, Closure $next, ...$params) {

        $limit  = (int) $params[0];
        $time   = (int) $params[1];
        $action = (int) $params[2];

        $tries = SiteAction::where('created_at', '>=', Carbon::now()->subMinutes($time)->toDateTimeString())
        ->where('ip', '=', $this->getIPAddress())
        ->where('action', '=', $action)
        ->count();

        if ($tries >= $limit) {
            return \response([
                'success' => false,
                'message' => "You have made $tries request(s) in the past $time minute(s). Please wait before making further requests.",
                'limiter' => [
                    'tries' => $tries,
                    'time'  => $time
                ]
            ], 429);    
        }
        
        return $next($request);

    }

}

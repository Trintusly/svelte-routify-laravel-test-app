<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function __invoke(Request $request) {
        $srch = User::where('username', 'LIKE', "%$request->username%")->latest()->limit(3);

        return response([
            'success' => true,
            'message' => "OK",
            'results' => [
                'yielded' => $srch->count(),
                'data' => $srch->get()
            ]
        ]);
    }
}

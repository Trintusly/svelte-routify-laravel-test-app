<?php

namespace App\Http\Controllers\User\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\Dashboard\UpdateStatusRequest;
use App\Models\User\Status;

class StatusController extends Controller
{
    public function fetch() {
        return response([
            'success'  => true,
            'message'  => 'OK!',
            'statuses' => Status::with('user:id,username,render_key')->latest()->paginate(4)->onEachSide(1)
        ]);
    }

    public function updateStatus(UpdateStatusRequest $request) {
        $status = auth()->user()->status()->create([ 'body' => $request->status ]);

        return response([ 'success' => true, 'message' => 'Status updated.', 'status' => $status ]);

    }
}

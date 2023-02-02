<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\User;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('/authentication/me', Authentication\MeController::class)->middleware('auth:sanctum');
Route::get('/authentication/unique/{user:username}', Authentication\UniquenessCheckController::class);

Route::post('/authentication/register', Authentication\RegisterController::class);
Route::post('/authentication/login', Authentication\LoginController::class)->middleware('iptimeout:1000,3,login:failed');
Route::post('/authentication/logout', Authentication\LogoutController::class);

Route::post('/user/settings/general/update-bio', [ User\Settings\GeneralController::class, 'updateBio' ])->middleware('auth:sanctum');
Route::post('/user/settings/security/change-password', User\Settings\Security\ChangePasswordController::class )->middleware('auth:sanctum');
Route::post('/user/dashboard/status/update-status', [User\Dashboard\StatusController::class, 'updateStatus'] )->middleware('auth:sanctum');
Route::get('/user/dashboard/status/get-statuses', [User\Dashboard\StatusController::class, 'fetch'] );
Route::get('/user/search', User\SearchController::class);
Route::get('/user/profile/{user:username}', User\Profile\GetProfileController::class);
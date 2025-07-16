<?php

use App\Http\Controllers\Us\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function ($router) {
    $router->group([
        'middleware' => 'api',
        'prefix' => 'us'
    ], function ($router) {
        // POST
        $router->group(['middleware' => ['api', 'auth:api']],  function ($router) {
            $router->post('/', [UserController::class, 'create']);
            $router->post('/login', [UserController::class, 'login']);
        });

        // GET
        $router->get('/me', [UserController::class, 'me']);
    });
});

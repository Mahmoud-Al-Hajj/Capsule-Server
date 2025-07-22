<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\CapsuleController;
use App\Http\Controllers\Common\AuthController;

Route::group(["middleware" => "auth:api"], function(){
Route::group(["prefix" => "user"], function(){
Route::get("/capsules", [CapsuleController::class, "getAllCapsules"]);
Route::post("/add_capsule", [CapsuleController::class, "addCapsule"]);
Route::get("/{userId}/capsules", [CapsuleController::class, "getCapsulesByUserId"]);
Route::get("/{id}/capsules", [CapsuleController::class, "getCapsulesByUser"]);
Route::delete("/delete_capsule/{id}", [CapsuleController::class, "deleteCapsule"]);
Route::get('/public_wall',[CapsuleController::class, 'getAllPublicCapsules']);
Route::post('/logout', [AuthController::class, 'logout']);
//id? means that id is optional.
    });
    });

//Route::group(["prefix" => "guest"], function(){
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//});

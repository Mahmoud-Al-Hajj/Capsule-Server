<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\CapsuleController;

Route::get("/capsules", [CapsuleController::class, "getAllCapsules"]);
Route::post("/add_capsule/{id?}", [CapsuleController::class, "addCapsule"]);
Route::get("/capsules/{id}", [CapsuleController::class, "getCapsule"]);
Route::delete("/delete_capsule/{id}", [CapsuleController::class, "deleteCapsule"]);
Route::get('/public_wall',[CapsuleController::class, 'getAllPublicCapsules']);
//id? means that id is optional.


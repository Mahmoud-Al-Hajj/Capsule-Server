<?php

namespace App\Services\User;
use App\Models\Capsule;


class CapsuleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }
static function createCapsule($request){
        $capsule = new Capsule;

        $capsule->user_id = 0;
        $capsule->title = isset($request["title"]) ? $request["title"] : $capsule->title;
        $capsule->message = isset($request["message"]) ? $request["message"] : $capsule->message;
        $capsule->mood = isset($request["mood"]) ? $request["mood"] : $capsule->mood;
        $capsule->reveal_at = isset($request["reveal_at"]) ? $request["reveal_at"] : $capsule->reveal_at;
        $capsule->is_public = isset($request["is_public"]) ? $request["is_public"] : $capsule->is_public;
        $capsule->ip_address =  isset($request["ip_address"]) ? $request["ip_address"] : $capsule->ip_address;
        $capsule->latitude = isset($request["latitude"]) ? $request["latitude"] : $capsule->latitude;
        $capsule->longitude = isset($request["longitude"]) ? $request["longitude"] : $capsule->longitude;
        $capsule->save();

    return  $capsule;
}
static function getAllTasks(){
return Capsule::all();

}
    }


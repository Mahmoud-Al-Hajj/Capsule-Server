<?php

namespace App\Services\User;
use App\Models\Capsule;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;





class CapsuleService{

static function getCapsulesByUserId($userId) {
    $user = User::with('capsules')->findOrFail($userId);
    return $user->capsules;
}


static function createCapsule($request){
        $capsule = new Capsule;

    $ip = $request->ip();
    $location = Location::get($ip);

    // default val
        $capsule->is_public = false;
        $capsule->mood = 'neutral';

        //Auth::id() retrieves the ID of the currently authenticated user.
        $capsule->user_id = Auth::id();
        // https://laravel.com/docs/12.x/authentication#main-content
        $capsule->title = $request["title"] ?? null;
        $capsule->message = $request["message"] ?? null;
        $capsule->mood = $request["mood"] ?? $capsule->mood;
        $capsule->reveal_at = $request["reveal_at"] ?? null;
        $capsule->is_public = $request["is_public"] ?? $capsule->is_public;
        $capsule->country = $location?->country ?? null;
        $capsule->ip_address = $ip;
        $capsule->latitude   = $location?->latitude ?? null;
        $capsule->longitude  = $location?->longitude ?? null;

        $photo=$request["photo"];
        $Decoded_photo = Str::fromBase64($photo);
        $url_photo = Storage::url($Decoded_photo);

        $capsule->photo = $url_photo;



        $capsule->save();

        return  $capsule;
}

static function getAllCapsules(){
return Capsule::all();
}


static function getAllPublicCapsules($request = null) {
    $q = Capsule::where('is_public', true)->where('reveal_at', '<=', now());
    $mood = $request->mood;
    $country = $request->country;

    if ($request) {
    if ($mood) {
            $q->where('mood', $request->mood);
    }

    if ($country) {
            $q->where('country', $request->country);
    }
    if ($request->has('from_date')) {
        $q->whereDate('reveal_at', '>=', $request->from_date);
    }

    if ($request->has('to_date')) {
        $q->whereDate('reveal_at', '<=', $request->to_date);
    }
    }
    $capsules = $q->get();
    return $capsules;
}

static function deleteCapsule($id){
    $capsule = Capsule::findOrFail($id)->delete();
    return ["status" => "success"];
}

    }


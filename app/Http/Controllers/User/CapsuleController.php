<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Capsule;
use App\Services\User\CapsuleService;



class CapsuleController extends Controller{

    function getAllCapsules(){
        $capsules = CapsuleService::getAllTasks();
        return  $this->responseJSON($capsules,200);

    }

    function addCapsule(Request $request, $id = null){

        $capsule = CapsuleService::createCapsule($request);
        return  $this->responseJSON($capsule,200);


    }

    function getCapsule($id) {
    $capsule = Capsule::findOrFail($id);

    return response()->json(['status' => 'success', 'payload' => $capsule], 200);
}
function getAllPublicCapsules(){
    $capsules = Capsule::where('is_public', true)->get();

  return  $this->responseJSON($capsules,200);

}

function deleteCapsule($id){
    $capsule = Capsule::findOrFail($id) -> delete();
    #$capsule->delete();

    $response = [];
    $response["status"] = "success";
}

}

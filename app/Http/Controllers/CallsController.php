<?php

namespace App\Http\Controllers;

use App\Http\Resources\CallsResource;
use App\Models\Calls;
use Illuminate\Http\Request;

class CallsController extends Controller
{
    public function calls()
    {
        $calls = CallsResource::collection(Calls::all());
        return response()->json(['result'=>$calls]);
    }
}

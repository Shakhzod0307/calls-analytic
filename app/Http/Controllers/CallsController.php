<?php

namespace App\Http\Controllers;

use App\Http\Resources\CallsResource;
use App\Models\Calls;
use App\Models\Ratings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallsController extends Controller
{
    public function calls(string $number , string $year)
    {
        $num = Calls::whereYear('started_at',$year)
            ->limit($number)
            ->orderBy('started_at')
            ->get();
        $calls = CallsResource::collection($num);
        return response()->json(['result'=>$calls],200);
    }

    public function rating(Request $request, $id)
    {
        $rating = Ratings::find($id);
        $rating->rating = $request->rating;
        $rating->save();
        return response()->json(['result'=>"Call rated successfully!"]);
    }
}

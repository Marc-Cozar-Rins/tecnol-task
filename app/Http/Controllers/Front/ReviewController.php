<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use Auth;


class ReviewController extends Controller
{
    public function store(ReviewRequest $request){

        Review::create([
            'opinion' => $request->input('opinion_text'),
            'stars' => $request->input('stars'),
            'user_id' => Auth::user()->id,
            'product_id' => $request->input('product_id'),  
        ]);
        
        return redirect()->back()->with(['retCode' => '0', 'msj' => 'Review succesfully created']);  
    }
}

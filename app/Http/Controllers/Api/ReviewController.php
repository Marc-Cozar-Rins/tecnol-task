<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Review $review){

        $review = Review::findOrFail($review->id);
        
        return response()->json([
            'user_name' => $review->user->name,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(){

        $reviews = Review::paginate(25);

        return view('back.reviews.index', ['reviews'=>$reviews]);
    }

    public function delete(Review $review){

        if($review->delete()) {
            $msg = ['Review deleted succesfully', 'success'];
        } else {
            $msg = ['Error deleting review', 'danger'];
        }

        return redirect()->back()->with('message', $msg);
    }
}

@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">


    @if ($errors->any())
            <div class="alert alert-danger ml-3 mr-3">{{ $errors->first() }}</div>
        @endif
    @if(Session::has('retCode'))
        @if(Session::get('retCode') == 1)
            <div class="alert alert-danger">
                {{ Session::get('msj')}}
            </div>
        @else
            <div class="alert alert-success">
                {{ Session::get('msj')}}
            </div>
        @endif
    @endif
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            
                            {{-- Product images slider --}}
                            <img src="{{$product->image ? Storage::url($product->image) : asset('storage/images/products/default.svg')}}">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('front.products')}}" class="btn btn-white float-right"><i class="fa-solid fa-angle-left"></i> < Return</a>
                            </div>
                            <div class="mt-4 mb-3"></span>
                                <h5 class="text-uppercase">{{$product->name}}</h5>
                                <div class="row align-items-center"> 
                                    <div class="act-price"><i class="fa-solid fa-calendar-days"></i>Category: {{$product->category->name}}</div>
                                    {{-- <div class="ml-2"><i class="fa-solid fa-clock"></i><span> {{$event->hour}}</span> </div> --}}
                                    <div class="ml-2"><i class="fa-solid fa-user-group"></i><span> Available: {{$product->quota}}</span> </div>
                                </div>
                            </div>
                            <p class="about">{{$product->description}}</p>
                            <button type="button" class="btn btn-light">BUY</button>
                        </div>
                    </div>
                </div>
            </div>


            {{-- MAKE REVIEW IF LOGED --}}

            @if(Auth::check())
            <form action="{{ route ('front.reviews.store', $product)}}" method="POST">
                @csrf
                <label for="opinion_text" class="form-label">Review</label>
                <textarea id="opinion_text" name="opinion_text" cols="30" rows="4" class="form-control"></textarea>
                <p class="form-text">Write your review</p>
                <label for="stars" class="form-label">Rating</label>
                <input type="number" name="stars" id="stars" min="1" max="5">
                <p class="form-text">Rate the product</p>
                <input type="hidden"  id="user_id" name="user_id" value="{{Auth::id()}}">
                <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="" value="">
                <button type="submit" class="btn btn-info">Send</button>
             </form>

             @endif
            {{-- ALL REVIEWS --}}

            <div class="card mt-3">
                <div class="card">
                    <div class="card-header">
                      REVIEWS ({{sizeof($product->reviews)}})
                    </div>
                    @php $countReviews = sizeof($product->reviews); $countLoop = 0 @endphp
                        @if($countReviews != 0)
                            @foreach ($reviews as $review)
                            @php $countLoop++ @endphp
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h5 class="card-title">{{$review->user->name}}</h5>
                                    </div>
                                    <div class="col-4 flex-end">
                                        <p>Rate: {{$review->stars}}</p>
                                    </div>
                                </div>
                                <p class="card-text">{{$review->opinion}}</p>
                            </div>
                            @if($countLoop != $countReviews)
                                <hr class="dotted">
                            @endif
                            
                            @endforeach
                        @else
                            <p class="text-danger mt-3 ml-3">There are no reviews yet.</p>
                        @endif

                        <div class="container d-flex justify-content-center">
                            {{ $reviews->links() }}
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>


    

    
@endsection
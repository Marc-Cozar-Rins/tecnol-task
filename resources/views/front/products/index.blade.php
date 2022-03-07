@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger ml-3 mr-3">{{ $errors->first() }}</div>
    @endif
    @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message')[1] }} ml-3 mr-3">{{ Session::get('message')[0] }}</div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="card mx-2 my-2" style="width: 18rem;">
                    <img class="card-img-top"
                        src="{{ $product->image ? Storage::url($product->image) : asset('storage/images/products/default.svg') }}"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-price">{{ $product->description }}</p>
                        <p class="card-price">{{ $product->price }} €</p>
                        <a href="{{route('front.products.show', $product)}}" class="btn btn-primary">Buy product</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
{{-- {{$product->image ? $product->image : asset('storage/images/products/default.svg')}} --}}

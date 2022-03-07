@extends('layouts.app')

@section('content')
    <div class="container">
        @if($errors->any())
                <div class="alert alert-danger ml-3 mr-3">{{$errors->first()}}</div>
        @endif
        @if(Session::has('message'))
                <div class="alert alert-{{Session::get('message')[1]}} ml-3 mr-3">{{Session::get('message')[0]}}</div>
        @endif
        
        <div class="row">
            <div class="col-6">
                <h1>PRODUCTS</h1>
            </div>
            <div class="col-6" style="text-align: right">
                <a href="{{route('back.products.create')}}" class="btn btn-primary float-right"><i class="ti-plus"></i> New product</a>
            </div>
        </div>
        
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Product name</th>
                <th scope="col">price</th>
                <th scope="col">quota</th>
                <th scope="col">Created by</th>
                <th scope="col">status</th>
              </tr>
            </thead>
            <tbody>


                @foreach ($products as $product)


                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}} €</td>
                    <td>{{$product->quota}}</td>
                    <td>User: {{$product->user->name}}</td>
                    <td>{{$product->status}}</td>
                    <td>
                        <a href="{{route ('back.products.edit', $product)}}" class="btn btn-warning">Edit</a>
                        <a href="{{route ('back.products.delete', $product)}}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
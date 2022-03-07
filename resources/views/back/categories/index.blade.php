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
                <h1>CATEGORIES</h1>
            </div>
            <div class="col-6" style="text-align: right">
                <a href="{{route('back.categories.create')}}" class="btn btn-primary float-right"><i class="ti-plus"></i> New category</a>
            </div>
        </div>
        
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Category name</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>


                @foreach ($categories as $category)


                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}} €</td>
                    <td>{{$category->status}}</td>
                    <td>
                        <a href="{{route ('back.categories.edit', $category)}}" class="btn btn-warning">Edit</a>
                        <a href="{{route ('back.categories.delete', $category)}}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container d-flex justify-content-center">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
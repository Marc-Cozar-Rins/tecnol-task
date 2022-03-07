@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger ml-3 mr-3">{{ $errors->first() }}</div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-{{ Session::get('message')[1] }} ml-3 mr-3">{{ Session::get('message')[0] }}</div>
        @endif

        <div class="row">
            <div class="col-6">
                <h1>REVIEWS</h1>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">User name</th>
                    <th scope="col">Product</th>
                    <th scope="col">Stars</th>
                    <th scope="col">Opinion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <th scope="row">{{ $review->id }}</th>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->product->name }}</td>
                        <td>{{ $review->stars }}</td>
                        <td>User: {{ $review->opinion }}</td>
                        <td>
                            <a href="{{ route('back.reviews.delete', $review) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="container d-flex justify-content-center">
            {{ $reviews->links() }}
        </div>
    </div>
@endsection

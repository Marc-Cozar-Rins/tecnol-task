@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="text-align: right">
            <a href="{{ route('back.products') }}" class="btn btn-white float-right"><i
                    class="os-icon os-icon-chevron-left"></i>
                < Return</a>
        </div>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger ml-3 mr-3">{{ $errors->first() }}</div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-{{ Session::get('message')[1] }} ml-3 mr-3">{{ Session::get('message')[0] }}</div>
        @endif
        <div class="card mb-4">
            <div class="card-header">{{ $product->id ? 'Editing Product' : 'New Product' }}</div>
            <div class="card-body">
                <form method="post"
                    action="{{ $product->id ? route('back.products.update', $product->id) : route('back.products.store') }}"
                    id="send-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1">Product Name</label>
                            <input class="form-control" name="name"
                                value="{{ $product->name ? $product->name : old('name') }}"
                                data-error="Please, enter the name" placeholder="Name" required="required" type="text">
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1">Category</label>
                            <select name="category_id" class="form-control select2">
                                <option value="">Select one category....</option>
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $product->category_id ? 'selected' : old('category_id') }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-4">
                            <label class="small mb-1">PRICE</label>
                            <input class="form-control" name="price"
                                value="{{ $product->id ? $product->price : old('price') }}" required="required"
                                type="number">
                        </div>
                        <div class="col-md-4">
                            <label class="small mb-1">QUOTA</label>
                            <input class="form-control" name="quota"
                                value="{{ $product->id ? $product->quota : old('quota') }}" required="required"
                                type="number">
                        </div>
                        <div class="col-md-4">
                            <label>STATUS</label>
                            <div class="row">
                                <div class="col-sm-4 mt-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            {{ $product->id ? ($product->status ? 'checked' : '') : '' }} name="status"
                                            id="exampleRadios1" value="1">
                                        <label class="form-check-label" for="exampleRadios1"> Active</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            {{ $product->id ? (!$product->status ? 'checked' : '') : 'checked' }}
                                            name="status" id="exampleRadios2" value="0">
                                        <label class="form-check-label" for="exampleRadios2"> Inactive</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" required="required"
                                    type="text">{{ $product->id ? $product->description : old('description') }}</textarea>
                                <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row gx-3 mb-3">
                        <div class="col-md-3">
                            @if ($product->image)
                                <img src="{{ Storage::url($product->image) }}" style="max-width: 300px; max-height:300px">
                            @endif
                            <br>
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Upload your image </label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file" name="image">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-buttons-w">
                                <button id="validateForm" class="btn btn-success" type="submit"> Guardar</button>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

                </form>
            </div>
        </div>
    </div>
@endsection

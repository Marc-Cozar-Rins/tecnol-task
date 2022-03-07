@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="text-align: right">
            <a href="{{ route('back.categories') }}" class="btn btn-white float-right"><i
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
            <div class="card-header">{{ $category->id ? 'Editing Category' : 'New Category' }}</div>
            <div class="card-body">
                <form method="post"
                    action="{{ $category->id ? route('back.categories.update', $category->id) : route('back.categories.store') }}"
                    id="send-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1">Category Name</label>
                            <input class="form-control" name="name"
                                value="{{ $category->name ? $category->name : old('name') }}"
                                data-error="Please, enter the name" placeholder="Name" required="required" type="text">
                        </div>
                        <div class="col-md-6">
                            <label>STATUS</label>
                            <div class="row">
                                <div class="col-sm-4 mt-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            {{ $category->id ? ($category->status ? 'checked' : '') : '' }} name="status"
                                            id="exampleRadios1" value="1">
                                        <label class="form-check-label" for="exampleRadios1"> Active</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            {{ $category->id ? (!$category->status ? 'checked' : '') : 'checked' }}
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
                                    type="text">{{ $category->id ? $category->description : old('description') }}</textarea>
                                <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row gx-3 mb-3">
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

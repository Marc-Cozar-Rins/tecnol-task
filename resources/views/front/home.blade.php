@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if (Session::has('retCode'))
                @if (Session::get('retCode') == 1)
                    <div class="alert alert-danger">
                        {{ Session::get('msj') }}
                    </div>
                @else
                    <div class="alert alert-success">
                        {{ Session::get('msj') }}
                    </div>
                @endif
            @endif
            
            

    </div>
@endsection
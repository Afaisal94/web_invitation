@extends('layouts.adm')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Theme Show') }}</div>

                    <div class="card-body">                    
                    
                    <p>Theme name : {{ $themes->theme_name }}</p>
                    <p>View name : {{ $themes->view_name }}</p>
                    <img class="img-fluid" src="{{ url('/theme_img/'.$themes->thumbnail) }}">
                  
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
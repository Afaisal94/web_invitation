@extends('layouts.adm')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Theme') }}</div>

                    <div class="card-body">

                    <form method="post" action="{{ url('/themes/update',$themes->id) }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Theme Name</label>
                            <input type="text" class="form-control" name="theme_name" value="{{ $themes->theme_name }}">
                        </div>
                        <div class="form-group">
                            <label>View Name</label>
                            <input type="text" class="form-control" name="view_name" value="{{ $themes->view_name }}">
                        </div>
                        <div class="form-group">
                            <label>Thumbnail Theme</label>
                            <input type="file" class="form-control" name="thumbnail">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Save</button>
                    </form>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
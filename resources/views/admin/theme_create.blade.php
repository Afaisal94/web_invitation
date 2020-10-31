@extends('layouts.adm')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Theme') }}</div>

                    <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post" action="{{ url('/themes/store') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>Theme Name</label>
                            <input type="text" class="form-control" name="theme_name">
                        </div>
                        <div class="form-group">
                            <label>View Name</label>
                            <input type="text" class="form-control" name="view_name">
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
@extends('layouts.adm')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Photo') }}</div>

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

                    <form method="post" action="{{ url('/galleries/store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="invitation_id" value="{{ $id }}">
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Save</button>
                    </form>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
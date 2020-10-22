@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Themes') }}</div>

                    <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <a class="btn btn-primary" href="{{ url('/themes/create') }}" style="margin-bottom:10px">New Theme</a>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Theme Name</th>
                                <th>View Name</th>
                                <th>Thumbnail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($themes as $a)
                            <tr>
                                <td>{{ $a->theme_name }}</td>
                                <td>{{ $a->view_name }}</td>
                                <td><img style="width:100px" class="img-fluid" src="{{ url('/theme_img/'.$a->thumbnail) }}"></td>
                                <td>
                                    <form action="{{ route('themes.destroy',$a->id) }}" method="POST">
    
                                    <a class="btn btn-success" href="{{ route('themes.show',$a->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('themes.edit',$a->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
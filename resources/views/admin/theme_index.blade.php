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
                                <th>No</th>
                                <th>Theme Name</th>
                                <th>View Name</th>
                                <th>Thumbnail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($themes as $theme)
                            <tr>
                                <td scope="row">{{ ++$i }}</td>
                                <td>{{ $theme->theme_name }}</td>
                                <td>{{ $theme->view_name }}</td>
                                <td><img style="width:100px" class="img-fluid" src="{{ url('/theme_img/'.$theme->thumbnail) }}"></td>
                                <td>
                                    <form action="{{ route('themes.destroy',$theme->id) }}" method="POST">
    
                                    <a class="btn btn-success" href="{{ route('themes.show',$theme->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('themes.edit',$theme->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                       {!! $themes->links() !!}
                    </div>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
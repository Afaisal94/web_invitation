@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Gallery') }}</div>

                    <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <a class="btn btn-primary" href="{{ url('/galleries/create', $id) }}" style="margin-bottom:10px">New Photo</a>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $g)
                            <tr>
                                <td><img style="width:200px" class="img-fluid" src="{{ url('/gallery/'.$g->photo) }}"></td>
                                <td>
                                    <form action="{{ route('galleries.destroy',$g->id) }}" method="POST">

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
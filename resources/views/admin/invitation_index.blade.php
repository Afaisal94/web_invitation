@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Invitations') }}</div>

                    <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <a class="btn btn-primary" href="{{ url('/invitations/create') }}" style="margin-bottom:10px">New Invitation</a>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Created at</th>
                                <th>Invitation Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invitations as $a)
                            <tr>
                                <td>#</td>
                                <td>{{ $a->created_at }}</td>
                                <td>{{ $a->slug }}</td>
                                <td>
                                <form action="{{ route('invitations.destroy',$a->id) }}" method="POST">
    
                                <a class="btn btn-success" href="{{ route('invitations.show',$a->id) }}">Preview</a>

                                <a class="btn btn-primary" href="{{ route('invitations.edit',$a->id) }}">Edit</a>

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
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
                                <td scope="row">{{ ++$i }}</td>
                                <td>{{ date('d-m-Y', strtotime($a->created_at)) }}</td>
                                <td>{{ $a->slug }}</td>
                                <td>
                                <form action="{{ route('invitations.destroy',$a->id) }}" method="POST">
    
                                <a target="_blank" class="btn btn-sm btn-success" href="{{ route('invitation',$a->slug) }}">View</a>

                                <a class="btn btn-sm btn-info" href="{{ route('galleries',$a->id) }}">Gallery</a>

                                <a class="btn btn-sm btn-primary" href="{{ route('invitations.edit',$a->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {!! $invitations->links() !!}
                    </div>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
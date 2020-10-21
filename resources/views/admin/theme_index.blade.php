@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Themes') }}</div>

                    <div class="card-body">

                    <a class="btn btn-primary" href="{{ url('/themes/create') }}" style="margin-bottom:10px">New Theme</a>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Theme Name</th>
                                <th>View Name</th>
                                <th>Thumbnail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($themes as $a)
                            <tr>
                                <td>{{ $a->theme_name }}</td>
                                <td>{{ $a->view_name }}</td>
                                <td class="text-center">{{ $a->thumbnail }}</td>
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
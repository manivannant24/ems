@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('User Dashboard table') }}</h5>
                    </div>

                    <div class="card-body">
                       <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created_By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dbdataforhome as $dbfh)
                                    <tr>
                                        <td>{{ $dbfh->id }}</td>
                                        <td>{{ $dbfh->name }}</td>
                                        <td>{{ $dbfh->email }}</td>
                                        <td>admin</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

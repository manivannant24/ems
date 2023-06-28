@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class=" my-3" style="background-color:aqua; border-radius: 5px;"><h3> Hi {{auth::user()->name}}, welcome to Admin  Dashboard </h3></div>

                <div class="card my-3">
                    <div class="card-header">
                        <h5 > User Details Table </h5>
                    </div>

                    <div class="card-body ">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: wheat;">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">phone</th>
                                     <th scope="col">Last_Login</th>
                                    <th scope="col">Created_By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dbdataforhome as $dbfh)
                                    <tr>
                                        <td>{{ $dbfh->id }}</td>
                                        <td>{{ $dbfh->name }}</td>
                                        <td>{{ $dbfh->email }}</td>
                                        <td>{{ $dbfh->phone }}</td>
                                        <td>{{ $dbfh->last_login_at }}</td>
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

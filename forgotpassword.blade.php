@extends('layouts.app')
@section('content')
    <style>
        .card {
            padding: .3em .5em .5em;
            border-radius: 2em;
            text-align: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            background-color: beige;
        }
    </style>


    <div class="d-flex justify-content-center align-items-center">
        <div class="card" style="width: 28rem;">
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <form method="POST" action="{{ url('changePasswordPost') }}">
                    @csrf
                    <h3>User Profile Update</h3>
                    <hr><br>
                    <div class="form-group">
                        <label for="name">Name</label><br>
                        <input type="text" id="name" name="name" value="{{ $gudfdb->name }}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label><br>
                        <input type="email" id="exampleInputEmail1" name="email" aria-describedby="emailHelp"
                            value="{{ $gudfdb->email }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="currentpassword">Current Password</label><br>
                        <input type="password" id="currentpassword" name="currentpassword">
                    </div>
                    <div class="form-group">
                        <label for="newpassword">New Password</label><br>
                        <input type="password" id="newpassword" name="newpassword">
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword">Confirm Password</label><br>
                        <input type="password" name="confirmpassword" id="confirmpassword">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label><br>
                        <input type="number" name="phone" id="phone" value="{{ $gudfdb->phone }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection

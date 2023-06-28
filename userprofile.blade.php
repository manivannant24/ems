@extends('layouts.app')
@section('style')
@endsection
@section('content')
    </style>
    <div class=" d-flex justify-content-center align-items-center my-3">
        <div class="card " style="width: 28rem;">
            <div class="card-body">
                <style>
                    .card {
                        padding: .3em .5em .5em;
                        border-radius: 2em;
                        text-align: center;
                        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
                    }
                </style>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('updatesave') }}">
                    @csrf
                    <div class="mp-1 bg-success">
                        <h3 class="text-light">Edit Page</h3>
                    </div>
                    <hr><br>
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="{{ $gudfdb->id }}">
                        <label for="name">Name</label><br>
                        <input type="text" id="name" name="name" value="{{ $gudfdb->name }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">phone</label><br>
                        <input type="text" id="phone" name="phone" value="{{ $gudfdb->phone }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

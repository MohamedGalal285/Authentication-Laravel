@extends('layout.layout')
@section('page-header')
<x-page-header title="Create new user" />
@endsection
@section('content')
<div class="card card-primary">


    <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body" >
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" />

            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" />

            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="password" />
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection

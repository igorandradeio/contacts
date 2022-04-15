@extends('layouts.admin')
@section('title', 'Create contact')
@section('content')

<h1>Create contact</h1>

<hr class="col-3 col-md-2 mb-5">
<div class="container">
    <form class="contact-form" action="{{route('admin.contact.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Name</label>
            @error('name')
            <div class="alert alert-danger" role="alert">Name should be a string of any size greater than 5</div>
            @enderror
            <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>Contact</label>
            @error('contact')
            <div class="alert alert-danger" role="alert">Contact should be 9 digits and unique</div>
            @enderror
            <input type="tel" class="form-control" name="contact" placeholder="Enter your contact" value="{{ old('contact') }}">
        </div>

        <div class="form-group">
            <label>Email address</label>
            @error('email')
            <div class="alert alert-danger" role="alert">Email should be a valid email</div>
            @enderror
            <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary mb-2">Save</button>
    </form>
</div>
@endsection
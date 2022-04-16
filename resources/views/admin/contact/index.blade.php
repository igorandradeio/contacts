@extends('layouts.admin')
@section('title', 'Contacts - Home Page')
@section('content')

<h1>All contacts</h1>
<a href="{{route('admin.contact.create')}}" class="btn btn-primary ">Add Contact</a>

<hr class="col-3 col-md-2 mb-5">
<div class="container">
    @foreach($contacts as $contact)

    <div class="card">
        <div class="card-header">
            {{$contact->name}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$contact->contact}}</h5>
            <p class="card-text">{{$contact->email}}</p>
            <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{route('website.contact.show', ['id' => $contact->id])}}" class="btn btn-primary ">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    <br>
    @endforeach
</div>
@endsection
@extends('layouts.app')
@section('content')
<h2 class="text-center text-primary">Edit  File Page:{{$drive->id}}</h2>
@if ($errors->any())
    <div class="alert alert-danger w-50 mx-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
  <form action="{{route('drives.update',$drive->id)}}" method="POST" enctype='multipart/form-data' >
      @csrf
  <div class="row">
    <div class="col-25">
      <label for="fname">File Title</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="title" placeholder="title" value="{{$drive->title}}">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname"> Description</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="description" placeholder="description" value="{{$drive->description}}">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname"> uploud file:{{$drive->file}}</label>
    </div>
    <div class="col-75">
      <input type="file" id="lname" name="file" placeholder="Your last name..">
    </div>
  </div>
 
  <br>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>

@endsection;
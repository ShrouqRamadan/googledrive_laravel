@extends('layouts.app')
@section('content')
<h1 class="text-center text-success">Show File :{{$drive->title}}</h1>
<div class="container">
<div class="text-center">
  <img src="{{asset("upload/$drive->file")}}" class="rounded" alt="...">
</div>
<div class="card-body">
<h4 class="text-success">File Name:{{$drive->file}}</h4>
<h4 class="text-success">description:{{$drive->description}}</h4>
<a href="{{route('drives.download',$drive->id)}}" class="btn btn-success">DownLoad File</a>
</div>
</div>

@endsection;
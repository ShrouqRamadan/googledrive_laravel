@extends('layouts.app')
@section('content')
<h1 class="text-center text-success">All Files</h1>
@if (Session::has('done'))
<div class="alert alert-success w-50 mx-auto" role="alert">
{{Session::get('done')}}
</div>
@endif
<table id="customers" class="container">
  <tr>
    <th>Id</th>
    <th>title</th>
    <th colspan='3'>actions</th>

    
  </tr>
  @foreach ($drive as $data)
      <tr>
          <td>{{$data->id}}</td>
    <td>{{$data->title}}</td>
    <td><a href="{{route('drives.show',$data->id)}}" class="btn btn-info">Show</a></td>
    <td><a href="{{route('drives.delete',$data->id)}}" class="btn btn-danger">Remove</a></td>
    <td><a href="{{route('drives.edit',$data->id)}}" class="btn btn-info">Edit</a></td>
     </tr>
  @endforeach
</table>
@endsection
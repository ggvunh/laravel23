@extends('layouts.master')
@section('header')
 <h1>List all cats page @if(isset($breed)) by {{$breed->name}} @endif</h1>
@stop

@section('content')
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Breed</th>
    </tr>
    @foreach ($cats as $cat)
    <tr>
      <td>{{$cat->id}}</td>
      <td><a href="{{url('cats/' . $cat->id)}}">{{$cat->name}}</a></td>
      <td> @if($cat->breed) <a href="{{url('cats/breeds/' . $cat->breed->name)}}">{{$cat->breed->name}}<a>@endif</td>
    </tr>
    @endforeach

  </table>
@stop

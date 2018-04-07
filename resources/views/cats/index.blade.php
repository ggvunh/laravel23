@extends('layouts.app')
@section('header')
 <h1>List all cats page @if(isset($breed)) by {{$breed->name}} @endif</h1>
 <a href="{{url('cats/create')}}" class="btn btn-primary pull-right"> Create new cat </a>
@stop

@section('content')
  <table class="table">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Breed</th>
      <th>Owner</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
    @foreach ($cats as $cat)
    <tr>
      <td>{{$cat->id}}</td>
      <td><a href="{{url('cats/' . $cat->id)}}">{{$cat->name}}</a></td>
      <td> @if($cat->breed) <a href="{{url('cats/breeds/' . $cat->breed->name)}}">{{$cat->breed->name}}<a>@endif</td>
      <td> @if($cat->user){{$cat->user->name}}@endif</td>
      <td>
        @if ($cat->canEdit())
          <a href="{{url('cats/' . $cat->id . '/update' )}}" class="btn btn-success">Update</a>
        @endif
      </td>
      <td>
        @if (Auth::user()->isAdmin())
          <a href="{{url('cats/' . $cat->id . '/delete' )}}" class="btn btn-warning">Delete</a>
        @endif
      </td>
    </tr>
    @endforeach

  </table>
@stop

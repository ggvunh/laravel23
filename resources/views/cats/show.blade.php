@extends('layouts.master')
@section('header')
 <h1>Show detail cat</h1>
@stop

@section('content')
  <h3>Name: {{$cat->name}}</h3>
  <h3>Breed: {{$cat->breed->name ?? ''}}</h3>
  <h3>Date of birth: {{$cat->date_of_birth}}</h3>
  <h3>Last modify: {{$cat->updated_at->diffForHumans()}}</h3>

  <a href="{{url('/')}}" class="btn btn-success">Back to home page</a>
@stop

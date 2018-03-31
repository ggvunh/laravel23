@extends('layouts.master')
@section('header')
<h1>Create new cat</h1>
@stop

@section('content')
  {!! Form::open(['url' => '/cats', 'method' => 'post']) !!}
    @include('partials.forms.cat')
  {!! Form::close() !!}
@stop

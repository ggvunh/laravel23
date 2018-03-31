@extends('layouts.master')
@section('header')
<h1>Update new cat</h1>
@stop

@section('content')
  {!! Form::model($cat, ['url' => '/cats/' . $cat->id, 'method' => 'put']) !!}
    @include('partials.forms.cat')
  {!! Form::close() !!}
@stop

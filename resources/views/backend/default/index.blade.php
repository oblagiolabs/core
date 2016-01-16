@extends('backend.layouts.layout')

@section('content')

<div class="container">
  <div class="jumbotron">
    <h1>OBLAGIO CORE</h1>
    <p>Welcome : {{ \Auth::user()->name }}</p>
  </div>
</div>


@stop
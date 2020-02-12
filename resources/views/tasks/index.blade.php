@extends('tasks.app')
@section('title','IndexPage')

@section('content')
<p>Hello {{ Auth::user()->name }}さん</p>
@endsection
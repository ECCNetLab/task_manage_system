@extends('tasks.app')
@section('title','IndexPage')

@section('content')
<div class="container mt-4">
    <h1 class="h5 mb-4">Hello {{ Auth::user()->name }}さん</h1>
    <div class="mt-5">
        <a class="btn btn-primary" href="{{ route('tasks.create') }}">新規問題作成</a>

    </div>
</div>


@endsection
@extends('tasks.app')
@section('title','IndexPage')

@section('content')
<div class="container mt-4">
	<div class="mb-4">
		<div class="h3">Hello {{ Auth::user()->name }}さん
		<a class="btn btn-primary float-right" href="{{ route('tasks.create') }}">新規問題作成</a>
	</div>
</div>
	
	<div class="mt-5">	
		@if($tasks !== null)
		@foreach($tasks as $task)
		<div class="card card-default">
		<div class="card-header">
			<h3 class="card-title"><a href="{{ route('tasks.show',$task->id) }}">{{$task->title}}</a></h3>
		</div>
		<div class="card-body">
			<h5>{{$task->body}}</h5>
			Tag @foreach($task->tags as $tag)
			<a class="btn btn-primary btn-sm bg-white">{{ $tag->name }}</a>
			@endforeach		
		</div>
		<div class="card-footer">
			<div class="float-right d-none d-sm-inline-block">
			Create User {{ $task->create_user }}
			</div>
		</div>
		@endforeach
		@endif
	</div>
</div>
@endsection
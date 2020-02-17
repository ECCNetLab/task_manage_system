@extends('tasks.app')
@section('title','IndexPage')

@section('content')
<div class="container mt-4">
	<div class="card card-default">
		<div class="card-header">
			<h3 class="card-title">{{ $task->title }}</h3>
		</div>
		<div class="card-body">
			<h5>{!! nl2br(e($task->body)) !!}</h5>
			Tag @foreach($task->tags as $tag)
			<a class="btn btn-primary btn-sm bg-white">{{ $tag->name }}</a>
			@endforeach
		</div>

		<!-- fotter -->
		<div class="card-footer">
			<div class="float-right d-none d-sm-inline-block">
			Create User {{ $user->name }}
			</div>
		</div>
	</div>
</div>
@endsection
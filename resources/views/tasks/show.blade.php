@extends('tasks.app')
@section('title','IndexPage')

@section('content')
<div class="container mt-4">
	<div class="card card-default">
		<div class="card-footer">
			<div class="float-left">
				<h3 style="display:inline">{{ $task->title }}</h3>
			</div>
			<div class="float-right">
				@auth
					@if(Auth::user()->id === $user->id)
						<a class="btn btn-info" href="{{ route('tasks.edit',$task->id) }}">
							<i class="fas fa-pencil-alt"></i>Edit
						</a>
						<a class="btn btn-danger" href="#">
							<i class="fas fa-trash"></i>Delete
						</a>
					@endif
				@endauth
			</div>
		</div>
		<div class="card-body">
			<h5>{!! nl2br(e($task->body)) !!}</h5>
			Tag @foreach($task->tags as $tag)
				<a class="btn btn-primary btn-sm bg-white">{{ $tag->name }}</a>
			@endforeach
		</div>
		<div class="card-footer">
			<div class="float-right d-none d-sm-inline-block">
				Create User {{ $user->name }}
			</div>
		</div>
	</div>
</div>
@endsection
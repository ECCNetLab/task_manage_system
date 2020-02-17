@extends('tasks.app')
@section('title','IndexPage')

@section('content')
<div class="container mt-4">
	<div class="card card-default">
		<div class="card-header">
			<h3 class="card-title">{{ $task->title }}</h3>
			<div class="card-body">
				<h5>Custom Color Variants</h5>
			</div>
		</div>
		<div class="card-footer">
			<div class="float-right d-none d-sm-inline-block">
				Create User {{ option($task->user)->name }}.
			</div>
		</div>
	</div>
</div>


@endsection
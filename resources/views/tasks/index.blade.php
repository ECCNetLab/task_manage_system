@extends('tasks.app')
@section('title','IndexPage')

@section('content')
<div class="container mt-4">
  <div class="mb-4">
  @isset($tagname)
    <div class="h3">{{ $tagname }} で検索中</div>
  @endisset
    @auth
        <div class="h3">
      @empty($tagname)
          Hello {{ Auth::user()->name }} !!
      @endempty
          <a class="btn btn-primary float-right" href="{{ route('tasks.create') }}">新規問題作成</a>
        </div>
    @endauth
  </div>
  <div class="mt-5">
    @if($tasks ?? '')
      @foreach($tasks as $task)
        @if($task->status == 1)
          <div class="card card-default mt-3">
            <div class="card-header">
              <h3 class="card-title"><a href="{{ route('tasks.show',$task->id) }}">{{$task->title}}</a></h3>
              <ul class="nav nav-pills card-header-pills" style="width: 100%; overflow-x: scroll; flex-wrap: nowrap">
                <li class="nav-item">
                  <a class="disabled mr-4">Tags:</a>
                </li>
                @foreach($task->tags as $tag)
                <li clsss="nav-item">
                  <a class="btn btn-primary btn-sm mr-2" href="{{ route('tagSearch', $tag->name) }}">{{ $tag->name }}</a>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="card-body">
              <p>{!! nl2br(e($task->body)) !!}</p>

            </div>
            <!-- <div class="card-footer">
              <div class="float-right d-none d-sm-inline-block">
                Create User {{ $task->create_user }}
              </div>
            </div> -->
          </div>
        @endif
      @endforeach
    @endif
  </div>
</div>
<footer class="footer mt-3">
  <nav aria-label="Contacts Page Navigation">
    <ul class="pagination justify-content-center m-0">
      {{ $tasks->links() }}
    </ul>
  </nav>
</footer>
@endsection

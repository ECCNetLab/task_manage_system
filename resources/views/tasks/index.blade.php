@extends('tasks.app')
@section('title','IndexPage')

@section('content')
<div class="container mt-4">
  <div class="mb-4">
  @isset($tagname)
    <div class="h3">{{ $tagname }} で検索中</div>
  @endisset
    @auth
      @empty($tagname)
        <div class="h3">
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
            </div>
            <div class="card-body">
              <h5>{!! nl2br(e($task->body)) !!}</h5>
                Tag @foreach($task->tags as $tag)
                  <form action="{{ route('tagSearch',$tag->name) }}" style="display: inline" method="get">
                    <input type="submit" class="btn btn-primary btn-sm" value="{{ $tag->name }}">
                  </form>
                @endforeach
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

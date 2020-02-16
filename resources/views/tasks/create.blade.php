@extends('tasks.app')
@section('title','IndexPage')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">新規作成</h1>

            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf
                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input id="title" name="title" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label for="tags">タグ(カンマ区切り)</label>
                        <input id="tags" name="tags" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label for="body">本文</label>
                        <textarea id="body" name="body" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="file">ファイル</label>
                        <div class="custom-file">
                            <input type="file" id="file" name="file" class="custom-file-input">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('home') }}">キャンセル</a>
                        <button type="submit" class="btn btn-primary">投稿する</button>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
@endsection
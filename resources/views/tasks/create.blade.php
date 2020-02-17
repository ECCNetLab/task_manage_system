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
										<input type="hidden" id="status" name="status" value="1">
											<div class="btn-group dropup">
												<input type="submit" class="btn btn-success" value="投稿" id="submit-button">
												<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
														<span class="caret"></span>
												</button>
												<ul class="dropdown-menu dropdown-menu-right">
												<li><a id="menu-comment">投稿</a></li>
												<li><a id="menu-x-and-comment">下書き保存</a></li>
												</ul>
											</div>
										</div>
									</div>
							</fieldset>
					</form>
			</div>
	</div>
	
<script>
	$(function(){
	$('#menu-comment').click(function(){
			$('#submit-button').attr('value', '投稿');
			$('#status').val('1');
	});
	$('#menu-x-and-comment').click(function(){
			$('#submit-button').attr('value', '下書き保存');
			$('#status').val('0');
	});
	});
</script>
@endsection
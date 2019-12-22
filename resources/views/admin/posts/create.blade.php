@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create a Post</div>

        <div class="card-body">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            	@csrf
            	<div class="form-group">
            		<label for="">Title</label>
            		<input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
            		@error('title')
					    <div class="invalid-feedback">{{ $message }}</div>
					@enderror
            	</div>

            	<div class="form-group">
            		<label for="">Body</label>
            		<textarea name="content" class="form-control @error('content') is-invalid @enderror" id="" cols="30" rows="10"></textarea>
            		@error('content')
					    <div class="invalid-feedback">{{ $message }}</div>
					@enderror
            	</div>

            	<div class="form-group">
            		<label for="">Featured Image</label>
            		<input type="file" class="form-control @error('featured') is-invalid @enderror" name="featured">
            		@error('featured')
					    <div class="invalid-feedback">{{ $message }}</div>
					@enderror
            	</div>
            	<div class="form-group">
            		<input type="submit" class="btn btn-primary" value="Create">
            	</div>
            </form>
        </div>
    </div>
@endsection

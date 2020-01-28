@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Posts</div>

        <div class="card-body">

        	@if($posts->count() > 0)
	            <table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Title</th>
							<th>Category</th>
							<th scope="col">Created at</th>
							<th>Updated at</th>
							<th scope="col">Actions</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($posts as $post)
							<tr>
								<td>{{$post->title}}</td>
								<td>{{$post->category->name}}</td>
								<td>{{$post->created_at}}</td>
								<td>{{$post->updated_at}}</td>
								<td>
									<a href="{{ route('post.edit', ['id' => $post->id])}}" class="btn btn-success">Edit</button>
								</td>
								<td>
									<form action="{{ route('post.delete', ['id' => $post->id]) }}" method="post">
										@csrf
										@method('delete')
										<input type="submit" class="btn btn-danger" value="Delete"></input>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{$posts->links()}}
			@else
				<p>No Posts Found</p>
			@endif
        </div>
    </div>
@endsection

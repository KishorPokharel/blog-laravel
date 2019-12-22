@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">All Categories</div>

        <div class="card-body">
            <table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{$category->name}}</td>
							<td>
								<a href="{{ route('category.edit', ['id' => $category->id])}}" class="btn btn-success">Edit</button>
							</td>
							<td>
								<form action="{{ route('category.delete', ['id' => $category->id]) }}" method="post">
									@csrf
									@method('delete')
									<input type="submit" class="btn btn-danger" value="Delete"></input>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
        </div>
    </div>
@endsection

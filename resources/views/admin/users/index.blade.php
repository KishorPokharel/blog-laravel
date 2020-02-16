@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Users</div>

        <div class="card-body">

        	@if($users->count() > 0)
	            <table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th scope="col">Name</th>
							<th>E-Mail</th>
							<th>Roles</th>
							<th scope="col">Actions</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{$user->id}}</td>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>{{implode(' | ', $user->roles->pluck('role')->toArray())}}</td>
								<td>
									<a href="{{ route('user.edit', ['id' => $user->id])}}" class="btn btn-success">Edit</button>
								</td>
								<td>
									<form action="{{ route('user.delete', ['id' => $user->id]) }}" method="post">
										@csrf
										@method('delete')
										<input type="submit" class="btn btn-danger" value="Delete"></input>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{{-- {{$users->links()}} --}}
			@else
				<p>No Users Found</p>
			@endif
        </div>
    </div>
@endsection

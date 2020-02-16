@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
			<strong>{{$postsCount}}</strong>
			<strong>{{$usersCount}}</strong>
			<strong>{{$categoriesCount}}</strong>
        </div>
    </div>
@endsection

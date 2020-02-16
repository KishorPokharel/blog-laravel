@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit the User - <strong>{{$user->name}}</strong></div>

        <div class="card-body">
            <form action="{{ route('user.update', ['id' => $user->id])}}" method="post">
                @csrf
                @method('put')
                <h5>Select the roles to assign:</h5>
                @foreach($roles as $role)
                    <div class="form-check">
                        <input type="checkbox" name="roles[]" value="{{$role->id}}" class="form-check-input"
                        @if($user->roles->pluck('id')->contains($role->id)) checked @endif
                        >
                        <label class="form-check-label" for="">{{$role->role}}</label>
                    </div>
                @endforeach

                <div class="form-group mt-4">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit the Category</div>

        <div class="card-body">
            <form action="{{ route('category.update', ['id' => $category->id])}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name}}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
@endsection

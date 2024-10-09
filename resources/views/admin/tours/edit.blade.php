@extends('templates.main')

@section('content')
    <h1>Edit Category {{ $category->name }}</h1>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name', $category->name)}}">
        </div>

        <div class="mt-3">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{old('description', $category->description)}}">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary" name="new" value="0">Save</button>
        </div>
    </form>

@endsection

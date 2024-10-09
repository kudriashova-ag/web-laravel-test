@extends('templates.main')

@section('content')
    <h1>Create Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        

        <div class="mt-3">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary" name="new" value="1">Create and add new</button>

            <button type="submit" class="btn btn-primary" name="new" value="0">Create</button>
        </div>
    </form>

@endsection

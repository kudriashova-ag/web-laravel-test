@extends('templates.main')

@section('content')
    <h1>Categories</h1>

    <a href="{{route('categories.create')}}" class="btn btn-primary my-3">Create</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Tours</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->name}} ({{$category->tours_count}}) </td>
                <td>{{$category->description}}</td>
                <td>
                    @foreach ($category->tours as $tour)
                        <p>{{$tour->name}}</p>
                    @endforeach
                </td>
                <td>
                    <a href="{{route('categories.edit', $category)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('categories.destroy', $category)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
             @endforeach
        </tbody>
    </table>

@endsection
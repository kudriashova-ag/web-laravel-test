@extends('templates.main')

@section('content')
    <h1>Tours</h1>

    <a href="{{route('tours.create')}}" class="btn btn-primary my-3">Create</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tours as $tour)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="{{asset($tour->image)}}" alt="" width="100">
                </td>
                <td>{{$tour->name}}</td>
                <td>{{$tour->short_description}}</td>
                <td>{{$tour->category->name}}</td>
                <td>
                    <a href="{{route('tours.edit', $tour)}}" class="btn btn-warning">Edit</a>
                    <form action="{{route('tours.destroy', $tour)}}" method="POST">
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
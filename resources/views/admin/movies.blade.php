@extends('layouts.adminApp')
@section('content')
    <div id="content" class="p-4 p-md-5 pt-5 float-start w-75">
        <div class="row">
            <div class="col-12">
                <a href="movies/movieCreate" class="btn btn-primary mb-1">Add New</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Movie Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Show time</th>
                    <th scope="col">Movie Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>

                        <td class="movie-img">
                                <div class="w-50">
                                    <img class="img-fluid img-thumbnail rounded-circle" src="{{ $movie->movie_img }}"alt="">
                                </div>
                                </td>

                        <td>{{ $movie->name }}</td>
                        <td>{{ $movie->category->name }}</td>
                        <td>{{ $movie->show[0]->show_time }}</td>
                        <td>{{ $movie->status }}</td>
                        <td><a class="btn btn-success me-1" href="{{route("movies.edit",$movie->id)}}"><i class="bi bi-pencil-square"></i></a>
                            <form class="d-inline-block" action="{{route('movies.delete',$movie->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($movies) > 0)
            {{ $movies->links('pagination::bootstrap-5') }}
        @endif
    </div>
@endsection

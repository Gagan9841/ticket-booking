@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5 float-left w-75">
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
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie )
            <tr>
              <th scope="row">1</th>
              <td>{{$movie->name}}</td>
              <td>{{$movie->category->name}}</td>
              <td>{{$movie->show[0]->show_time}}</td>
              <td><a class="btn btn-success me-1" href="#"><i class="bi bi-pencil-square"></i></a><a class="btn btn-danger" href="#"><i class="bi bi-trash"></i></a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
          @if(count($movies) > 0)
          {{ $movies->links('pagination::bootstrap-5')}}
          @endif
  </div>
@endsection

@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <form class="row g-3" action="movieUpdate" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col-12 justify-content-center text-center">
            <span class="text-uppercase font-bold">Edit Movies</span>
        </div>
        <div class="col-md-6">
            <label for="movie_name" class="form-label">Name</label>
            <input type="text" class="form-control" value="{{$movie->name}}" name="movie_name" id="movie_name">
    </div>
    <div class="col-md-6">
        <label for="movie_category" class="form-label">Category</label>
        <select class="form-control" name="category_id">
            <option  disabled>Select Category</option>
            @foreach($cat as $category)
            <option value="{{ $category->id }} {{ ($category->id == $movie->category_id) ? 'selected' : '' }}">{{ $category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label for="movie_desc" class="form-label">Description</label>
      <textarea name="desc" name="movie_desc" id="movie_desc" rows="10" class="form-control " placeholder="Add short description about the movie...">{{$movie->description}}</textarea>
      {{-- <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"> --}}
    </div>
    <div class="col-6">
      <label for="movie_show" class="form-label">Show Time</label>
      <select class="form-control" name="showTime_id">

      <option  disabled>Select Show Time</option>
            @foreach($shows as $show)
            <option value="{{ $show->id }} {{ ($category->id == $movie->show_id) ? 'selected' : '' }}">{{ $show->show_time }}</option>
            @endforeach
      </select>
    </div>
    <div class="col-6">
        <label class="form-label" for="movie_status">Movie Status</label>
        <div id="movie_status border-3" class="movie_stat">
        <input type="radio" class="form-check-input" name="movie_status" value="Now Showing" id="now-showing">
        <label for="now-showing" class="form-check-label me-5" > Now Showing</label>
        <input type="radio" class="form-check-input" name="movie_status" value="Next Show" id="next-show">
        <label for="next-show" class="form-check-label me-5" >Next Show</label>
        <input type="radio" class="form-check-input" name="movie_status" value="Comming Soon" id="comming-soon">
        <label for="comming-soon" class="form-check-label" > Comming Soon</label>
    </div>
    </div>
    <div class="col-6">
        <img src="{{$movie->movie_img}}" alt="movie-img" width="50px" height="50px">
            <input type="checkbox" name="delete_img" value="img_delete">
        <label for="movie_img">Display Image</label>
            <input type="file" class="form-control" name="movie_img" id="movie_img">

    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
@endsection

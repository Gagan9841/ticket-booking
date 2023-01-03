@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <form class="row g-3">
        <div class="col-12 justify-content-center text-center">
            <span class="text-uppercase font-bold">Add new Movies</span>
        </div>
        <div class="col-md-6">
            <label for="movie_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="movie_name">
    </div>
    <div class="col-md-6">
        <label for="movie_category" class="form-label">Category</label>
        <select class="form-control" name="category_id">
            <option selected disabled>Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }} ">{{ $category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12">
        <label for="movie_desc" class="form-label">Description</label>
      <textarea name="desc" id="movie_desc" rows="10" class="form-control " placeholder="Add short description about the movie..."></textarea>
      {{-- <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"> --}}
    </div>
    <div class="col-12">
      <label for="movie_show" class="form-label">Show Time</label>
      <select class="form-control" name="showTime_id">

      <option selected disabled>Select Show Time</option>
            @foreach($shows as $show)
            <option value="{{ $show->id }} ">{{ $show->show_time }}</option>
            @endforeach
      </select>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
@endsection

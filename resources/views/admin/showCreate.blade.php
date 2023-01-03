@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <form class="row g-3">
        <div class="col-12 justify-content-center text-center">
            <span class="text-uppercase font-bold">Add new Show Time</span>
        </div>
        <div class="col-md-6">
            <label for="movie_name"  class="form-label">Show Time</label>
            <input type="text" placeholder="Add a new show time" class="form-control" id="movie_name">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
@endsection

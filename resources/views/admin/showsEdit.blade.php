@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <form class="row g-3" method="POST" action="showUpdate">
        @csrf
        @method('PATCH')
        <div class="col-12 justify-content-center text-center">
            <span class="text-uppercase font-bold">Add new Show Time</span>
        </div>
        <div class="col-md-6">
            <label for="show_time"  class="form-label">Show Time</label>
            <input type="time" value="{{$show_time->show_time}}" name="show_time" placeholder="Add a new show time" class="form-control" id="show_time">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
@endsection

@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5 float-left w-75">
    <div class="row">
        <div class="col-12">
            <a href="category/categoryCreate" class="btn btn-primary mb-1">Add New</a>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Category Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category )
            <tr>
              <th scope="row">1</th>
              <td>{{$category->name}}</td>
              <td><a class="btn btn-success me-1" href="#">Edit</a><a class="btn btn-danger  " href="#">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
  </div>
@endsection

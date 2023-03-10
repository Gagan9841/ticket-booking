@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <div class="col-12 justify-content-center text-center">
        <span class="text-uppercase font-bold">Add New Category</span>
    </div>
    <form class="row g-3" method="POST" action="categoryAdd" >
        @csrf
        <div class="col-md-6>
            <label for="cat_name" class="form-label">Category</label>
            <input type="text" name="category_name" placeholder="Add a new show time" class="form-control">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
@endsection

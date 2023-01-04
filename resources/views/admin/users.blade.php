@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5 float-left w-75">
    <div class="row">
        <div class="col-12">
            <a href="/register" class="btn btn-primary mb-1">Add New User</a>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
            <tr>
              <th scope="row">1</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>@if ($user->isAdmin===1)
                  Admin
                    @else($user->isAdmin===0)
                    User
                    @endif
            </td>
              <td><a class="btn btn-success me-1" href="#"><i class="bi bi-pencil-square"></i></a><a class="btn btn-danger  " href="#"><i class="bi bi-trash"></i></a></td>
            </tr>
            @endforeach
        </tbody>
      </table>
      @if(count($users) > 0)
          {{ $users->links('pagination::bootstrap-5')}}
          @endif
  </div>
@endsection

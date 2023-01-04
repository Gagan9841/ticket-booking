@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5 float-left w-75">
    <div class="row">
        <div class="col-12">
            <a href="shows/showCreate" class="btn btn-primary mb-1">Add New</a>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Show Time</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($shows as $show )
            <tr>
              <td>{{$show->show_time}}</td>
              <td><a class="btn btn-success me-1" href="{{route("shows.edit",$show->id)}}"><i class="bi bi-pencil-square"></i></a>
                <form class="d-inline-block" action="{{route('shows.delete',$show->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" role="button"><i class="bi bi-trash"></i></button>
            </form>
            </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      @if(count($shows) > 0)
          {{ $shows->links('pagination::bootstrap-5')}}
          @endif
  </div>
@endsection

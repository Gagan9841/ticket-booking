@extends('layouts.adminApp')
@section('content')
 <!-- Page Content  -->
 <div id="content" class="p-4 p-md-5 pt-5">
    <div class="row">
        <div class="col-4">
            <div class="border text-center rounded-pill">
                <h4>Total Movies</h4>
                <span class="btn btn-secondary w-25 count" >{{count($movies)}}</span>
            </div>
        </div>
        <div class="col-4">
            <div class="border text-center rounded-pill">
                <h4>Now Showing</h4>
                <span class="btn btn-secondary w-25 count" >{{count($status_count)}}</span>
            </div>
        </div>
        <div class="col-4">
            <div class="border text-center rounded-pill">
                <h4>Ticket Sold</h4>
                <span class="btn btn-secondary w-25 count" >{{$ticket_sold}}</span>
            </div>
        </div>
    </div>
  </div>
@endsection

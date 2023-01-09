@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5 float-start w-75">
    <div class="row">
        <div class="col-12">
            <a href="ticket-rate/rateCreate" class="btn btn-primary mb-1">Add New</a>
        </div>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th>S.N</th>
            <th scope="col">Ticket Type</th>
            <th scope="col">Rate(Rs.)</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $sn=1;
            @endphp
            @foreach ($ticket_rate as $ticket )
            <tr>
                <td>{{$sn++}}</td>
              <td>{{$ticket->type}}</td>
              <td>Rs. {{$ticket->rate}}</td>
              <td><a class="btn btn-success me-1" href="{{route("rate.edit",$ticket->id)}}"><i class="bi bi-pencil-square"></i></a>
                <form class="d-inline-block" action="{{route('rate.delete',$ticket->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" role="button"><i class="bi bi-trash"></i></button>
            </form>
            </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{-- @if(count($ticket) > 0)
          {{ $ticket->links('pagination::bootstrap-5')}}
          @endif --}}
  </div>
@endsection

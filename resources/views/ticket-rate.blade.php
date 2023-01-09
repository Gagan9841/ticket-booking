@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                  <th>S.N</th>
                  <th scope="col">Ticket Type</th>
                  <th scope="col">Rate(Rs.)</th>
                </tr>
              </thead>
              <tbody>
                  @php
                      $sn=1;
                  @endphp
                  @foreach ($tickets as $ticket )
                  <tr>
                      <td>{{$sn++}}</td>
                    <td>{{$ticket->type}}</td>
                    <td>Rs. {{$ticket->rate}}</td>
                  </tr>
                  @endforeach
              </tbody>
        </table>
    </div>
</div>
@endsection

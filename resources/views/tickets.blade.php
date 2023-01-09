@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <table class="table table-responsive table-striped">
            <thead>
                <tr>

                    <td>Movie Name</td>
                    <td>Seats</td>
                    <td>Show TIme</td>
                    <td>Booked Date</td>
                </tr>
            </thead>
            <tbody>
                @foreach ( $tickets as $ticket )
                <tr>
                    <td>{{$ticket->movie->name}}</td>
                    <td>{{$ticket->seat_no}}</td>
                    <td>{{$show[0]->show_time}}</td>
                    <td>{{$ticket->created_at}}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

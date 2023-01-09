@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <form class="row g-3" method="POST" action="rateAdd">
        @csrf
        <div class="col-12 justify-content-center text-center">
            <span class="text-uppercase font-bold">Add new Ticket</span>
        </div>
        <div class="col-md-6">
            <label for="ticket_type"  class="form-label">Ticket Type</label>
            <input type="text" name="ticket_type" id="ticket_type">
    </div>
        <div class="col-md-6">
            <label for="ticket_rate"  class="form-label">Ticket Rate</label>
            <input type="text" name="ticket_rate" id="ticket_rate">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
@endsection

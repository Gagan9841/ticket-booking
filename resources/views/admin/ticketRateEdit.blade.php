@extends('layouts.adminApp')
@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <form class="row g-3" method="POST" action="rateUpdate">
        @csrf
        @method('PATCH')
        <div class="col-12 justify-content-center text-center">
            <span class="text-uppercase font-bold">Update Ticket</span>
        </div>
        <div class="col-md-6">
            <label for="ticket_type"  class="form-label">Ticket Type</label>
            <input type="text" name="ticket_type" value="{{$rate->type}}" id="ticket_type">
    </div>
    <div class="col-md-6">
        <label for="ticket_rate"  class="form-label">Ticket Rate</label>
        <input type="text" name="ticket_rate" value="{{$rate->rate}}" id="ticket_rate">
</div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
@endsection

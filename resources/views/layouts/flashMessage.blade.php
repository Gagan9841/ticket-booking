@if ($message = Session::get('success'))
<div class="alert alert-success alert-block ">
    <i class="bi bi-emoji-smile-fill"></i>
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block ">
    <i class="bi bi-exclamation-circle-fill"></i>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block ">
    <i class="bi bi-exclamation-octagon-fill"></i>
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block ">
    <i class="bi bi-info-circle"></i>
	<strong>{{ $message }}</strong>
</div>
@endif


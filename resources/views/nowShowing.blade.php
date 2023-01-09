@extends('layouts.main')
@section('content')


<div class="row p-5">
    @foreach ($movies as $movie )
    <div class=" card col-4 me-4 mt-4">
        <div class="card-body">
            <figure class="movie">
                <div class="movie__hero">
                  <img src="https://www.mensjournal.com/wp-content/uploads/2018/10/rambo-main-3.jpg?quality=86&strip=all" alt="Rambo" class="movie__img">
                </div>
                <div class="movie__content">
                  <div class="movie__title">
                    <h1 class="heading__primary">{{$movie->name}} <i class="fas fa-fire"></i></h1>
                    <div class="movie__tag movie__tag--1">{{$movie->category->name}}</div>
                  </div>
                  <p class="movie__description">
                   {{$movie->description}}
                  </p>
                </div>
                <div class="movie__price"><a href="{{route("ticket.book",$movie->id)}}">BOOK NOW</a></div>
              </figure>
        </div>
    </div>

    @endforeach
</div>

@endsection

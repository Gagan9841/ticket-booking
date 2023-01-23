@extends('layouts.main')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide mb-2 " data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/image/1920_665 (1)_761748.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/image/1920X665_747298.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="image/avatar-2-logo_981239.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="shows-tab row">
        <div id="accordion">
            <div class="card col-4">
                <button class="btn btn-warning" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                            Now Showing
                        </h5>
                    </div>
                </button>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    @foreach ($movies as $movie)
                        @if ($movie->status === 'Now Showing')
                            <div class="card-body">
                                <figure class="movie">
                                    <div class="movie__hero">
                                        <img src="{{ $movie->movie_img }}" alt="movie-image" class="movie__img">
                                    </div>
                                    <div class="movie__content">
                                        <div class="movie__title">
                                            <h1 class="heading__primary">{{ $movie->name }} <i class="fas fa-fire"></i>
                                            </h1>
                                            <div class="movie__tag movie__tag--1">{{ $movie->category->name }}</div>
                                        </div>
                                        <p class="movie__description">
                                            {{ $movie->description }}
                                        </p>
                                    </div>
                                    <div class="movie__price"><a href="{{ route('ticket.book', $movie->id) }}">BOOK NOW</a>
                                    </div>
                                </figure>
                            </div>
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card col-4">
                <button class="btn btn-secondary collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                            Next Change
                        </h5>
                    </div>
                </button>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    @foreach ($movies as $movie)
                        @if ($movie->status === 'Next Show')
                            <div class="card-body">
                                <figure class="movie">
                                    <div class="movie__hero">
                                        <img src="{{ $movie->movie_img }}" alt="movie-image" class="movie__img">
                                    </div>
                                    <div class="movie__content">
                                        <div class="movie__title">
                                            <h1 class="heading__primary">{{ $movie->name }} <i class="fas fa-fire"></i>
                                            </h1>
                                            <div class="movie__tag movie__tag--1">{{ $movie->category->name }}</div>
                                        </div>
                                        <p class="movie__description">
                                            {{ $movie->description }}
                                        </p>
                                    </div>
                                    <div class="movie__price"><a href="{{ route('ticket.book', $movie->id) }}">BOOK NOW</a>
                                    </div>
                                </figure>

                            </div>
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card col-4">
                <button class="btn btn-dark collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                            Comming Soon
                        </h5>
                    </div>
                </button>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    @foreach ($movies as $movie)
                        @if ($movie->status === 'Comming Soon')
                            <div class="card-body">
                                <figure class="movie">
                                    <div class="movie__hero">
                                        <img src="{{ $movie->movie_img }}" alt="movie-image" class="movie__img">
                                    </div>
                                    <div class="movie__content">
                                        <div class="movie__title">
                                            <h1 class="heading__primary">{{ $movie->name }} <i class="fas fa-fire"></i>
                                            </h1>
                                            <div class="movie__tag movie__tag--1">{{ $movie->category->name }}</div>
                                        </div>
                                        <p class="movie__description">
                                            {{ $movie->description }}
                                        </p>
                                    </div>
                                    <div class="movie__price"><a href="{{ route('ticket.book', $movie->id) }}">BOOK
                                            NOW</a>
                                    </div>
                                </figure>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

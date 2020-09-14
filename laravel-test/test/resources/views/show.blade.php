@extends('layouts.app')

@section('title', 'Show advert')

@section('content')
    <div class="container">
        @foreach ( $adverts as $advert)
            <div class="col justify-content-center align-items-center">
                <div class="card flex-md-row mb-4">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">{{ $advert->getAttribute('advert_name') }}</a>
                        </h3>
                        <div class="mb-1 text-muted">Цена: {{$advert->getAttribute('advert_price')}}</div>
                        <p class="card-text mb-auto">{{ $advert->getAttribute('advert_description') }}</p>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" height="200" width="200"
                         src="{{ $advert->getAttribute('advert_images')[0] }}" alt="Card image cap">
                </div>
            </div>
        @endforeach
    </div>

    <div class="container">
        <div class="col justify-content-center ">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @for ($i = 1; $i < $adverts->lastPage()+1; $i++)
                        <li class="page-item">
                            <a class="page-link"
                               href="{{ $adverts->path() }}?page={{ $i }}">{{ $i }}
                            </a>
                        </li>
                    @endfor
                </ul>
            </nav>
        </div>
    </div>
@endsection

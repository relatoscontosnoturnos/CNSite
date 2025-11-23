@extends('layouts.stream')

@section('content')

<div class="section box-dark">
    <h1 class="section-title">Todos os Episódios</h1>

    <div class="episodes-list">

        @foreach($episodes as $ep)
        <article class="episode-card">
            <img class="episode-img"
                 src="{{ $ep['images'][0]['url'] ?? asset('img/capa contos.png') }}"
                 alt="Capa">

            <div class="episode-info">
                <h2>{{ $ep['name'] }}</h2>
                <a class="ep-play"
                   href="{{ $ep['external_urls']['spotify'] }}"
                   target="_blank">▶ Ouvir no Spotify</a>
            </div>
        </article>
        @endforeach

    </div>
</div>

@endsection

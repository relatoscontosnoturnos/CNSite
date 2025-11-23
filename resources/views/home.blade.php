@extends('layouts.stream')
@section('content')

{{-- HERO --}}
<div class="hero">  
    <div class="hero-info">
       <h1 class="hero-title">{{ $podcast }}</h1>
        <div class="hero-desc">
           Apresentado por Jack e Luiz, o Contos Noturnos mistura terror, suspense e humor na medida certa.
           Entre histórias assustadoras, lendas urbanas e relatos enviados pelos ouvintes, surgem comentários descontraídos, teorias malucas e boas risadas.
           Aqui, o medo nunca vem sozinho.
           E cada episódio é uma experiência leve, divertida e misteriosa — do jeito certo para ouvir de noite, ou até mesmo no caminho para o trabalho.
           Contos Noturnos: onde o terror encontra o bom humor e a noite fica mais interessante.
        </div>
                {{-- CURIOSIDADES --}}
        <div class="curiosidade-area">
            <div class="curiosidade-card" id="curiosidade-card">
                <span id="curiosidade-texto">Carregando...</span>
            </div>
        </div>
    </div>
    
</div>


<div class="box-dark">
    <div class="section ouija" id="ouija">
        <h2 class="ouija-title">Tabuleiro Ouija</h2>
        <p class="ouija-subtitle">
            Coloque as mãos sobre o cursor, respire fundo... e pergunte o que quiser.
        </p>

        <div class="ouija-board">
            <div class="ouija-letters">
                <div>A</div><div>B</div><div>C</div><div>D</div><div>E</div><div>F</div><div>G</div>
                <div>H</div><div>I</div><div>J</div><div>K</div><div>L</div><div>M</div><div>N</div>
                <div>O</div><div>P</div><div>Q</div><div>R</div><div>S</div><div>T</div><div>U</div>
                <div>V</div><div>W</div><div>X</div><div>Y</div><div>Z</div>
            </div>

            <div class="ouija-row">

            </div>

            <div class="ouija-row">

            </div>

            <div class="ouija-planchette" id="ouija-planchette">
                <span>👁️</span>
            </div>
        </div>

        <div class="ouija-controls">
            <button id="ouija-start" class="btn-ouija">Iniciar sessão</button>
            <button id="ouija-stop" class="btn-ouija btn-ouija-secondary">Encerrar</button>
        </div>

        <div class="ouija-output-wrapper">
            <div class="ouija-output-label">Mensagem recebida:</div>
            <div class="ouija-output" id="ouija-output">
                O tabuleiro está em silêncio... por enquanto.
            </div>
        </div>
    </div>
</div>



{{-- ÚLTIMO EPISÓDIO --}}
<div class="box-dark">
    <div class="section" id="ultimo">
        <div class="section-title">Último Episódio</div>

        <div class="episode-box">
            <img src="{{ $lastEpisode['images'][0]['url'] ?? $cover }}" alt="Episódio">

            <div class="preview-container">

                <h2>{{ $lastEpisode['name'] }}</h2>
                <p style="opacity:.8">{{ substr($lastEpisode['description'],0,180) }}...</p>

                <a class="ep-play" href="{{ $episode_spotify_url }}" target="_blank">
                    ▶ Ouvir no Spotify
                </a>

                @if($episode_preview_url)
                    <div class="floating-player">
                        <img src="{{ $lastEpisode['images'][0]['url'] }}" class="floating-cover">

                        <audio id="floating-audio">
                            <source src="{{ $episode_preview_url }}" type="audio/mpeg">
                        </audio>
                    </div>
                @endif

            </div> {{-- fim preview-container --}}
        </div> {{-- fim episode-box --}}
        </div> {{-- fim section --}}
</div>



{{-- APOIA-SE --}}
<div class="box-dark">
    <div class="section" id="apoie">
        <div class="section-title">Apoie o Projeto</div>

        <a class="ep-play" href="https://apoia.se/contosnoturnos" target="_blank">
            💛 Apoiar no Apoia.se
        </a>
    </div>
</div>

{{-- INSTAGRAM --}}

<div class="box-dark">
    <div class="section" id="insta">
        <div class="section-title">Instagram</div>

        <a class="ep-play" href="https://www.instagram.com/contosnoturnos.cn/#" target="_blank">
            Siga a gente!
        </a>
    </div>
</div>


{{-- YOUTUBE --}}
<div class="box-dark">
    <div class="section" id="youtube">
        <div class="section-title">Youtube</div>

        <a class="ep-play" href="https://www.youtube.com/@contosnoturnospodcast" target="_blank">
            Inscreva-se!
        </a>
    </div>
</div>

@endsection

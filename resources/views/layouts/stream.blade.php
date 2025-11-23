<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contos Noturnos</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

    

    .box-dark {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto 50px auto;

    padding: 40px 45px;

    border-radius: 18px;

    background:
        linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.75));
        

    background-size: cover;
    background-position: center;

    box-shadow: 0 0 40px rgba(0,0,0,0.6);
}
        /* =========================================================
           BASE DO SITE
        ========================================================== */
        body {
            margin: 0;
            background: url('/img/bgMaster.jpg') no-repeat center top;
            background-size: cover;
            color: #fff;
            font-family: 'Creepster', cursive !important;

            
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .bg-creepy {
    background: url('/img/bgMaster.jpg') no-repeat center bottom;
    background-size: cover;
    padding: 120px 40px 300px; /* importante para mostrar as mãos */
    border-radius: 20px;
}

        /* =========================================================
           SIDEBAR
        ========================================================== */
        .sidebar {
            width: 260px;
            padding: 30px 20px;
            border-right: 1px solid #222;
            position: fixed;
            height: 100vh;
            display: flex;
            flex-direction: column;

             background: linear-gradient(135deg, #2a1e11, #070707);
             backdrop-filter: blur(4px);
        }

        .sidebar-logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .sidebar-logo img {
            width: 200px;
        }

        .sidebar a {
            color: #bbb;
            text-decoration: none;
            padding: 12px 14px;
            display: block;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: 0.2s;
            font-size: 15px;
            font-weight: 500;
        }

        .sidebar a:hover {
            background: #1f1f1f;
            color: #fff;
        }

        /* =========================================================
           MAIN CONTENT
        ========================================================== */
    .main {
    margin-left: 260px;
    padding: 40px;
    width: calc(100% - 260px);
    display: flex;
    justify-content: center;
    }

    .main > .content-wrapper {
        width: 100%;
        max-width: 1100px; /* LIMITA largura total */
    }

        .section {
            margin-bottom: 70px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        /* =========================================================
           HERO
        ========================================================== */
    .hero {
    width: 100%;
    max-width: 1100px;  /* impede de estourar */
    margin: 0 auto 40px auto; /* centraliza */
    display: flex;
    gap: 50px;

    padding: 35px 45px;

    border-radius: 16px;

    /* Se quiser a imagem na hero, use esta camada*/
    background:
        linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.75)),
        url('/img/bground.png');
        padding: 35px 45px;
        border-radius: 16px;

    background-size: cover;
    background-position: center;
}


    .hero img {
    width: 340px;         /* imagem maior */
    height: auto;
    border-radius: 14px;
    object-fit: cover;
    box-shadow: 0px 10px 30px rgba(0,0,0,0.6);
        padding: 35px 45px;

    border-radius: 16px;
}

    .hero-info {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;  /* alinha TÍTULO ao topo */
    margin-top: 10px;             /* opcional, ajusta posição */
}
    .hero-title {
    font-family: 'Creepster', cursive !important;
    font-size: 58px;
    font-weight: 400;
    color: #fff;
    line-height: 1.1;
}


        .hero-desc {
            font-size: 18px;
            opacity: .8;
        }


        /* =========================================================
           EPISÓDIO RECENTE
        ========================================================== */
        .episode-box {
            display: flex;
            background: rgba(0,0,0,0.65);
             backdrop-filter: blur(4px);
            border-radius: 14px;
            gap: 25px;
          padding: 35px 45px;

           border-radius: 16px;
        }

        .episode-box img {
            width: 140px;
            border-radius: 10px;
        }

        .ep-play {
            margin-top: 12px;
            background: #1DB954;
            padding: 10px 18px;
            border-radius: 8px;
            display: inline-block;
            color: #000;
            font-weight: 600;
            text-decoration: none;
        }

        .preview-container {
    position: relative;
    display: inline-block;
}

.floating-player {
    position: absolute;
    top: -150px;
    left: 0;
    width: 200px;
    padding: 10px;
    background: #111;
    border-radius: 10px;
    opacity: 0;
    pointer-events: none;
    transition: .3s;
}

.preview-container:hover .floating-player {
    opacity: 1;
    pointer-events: all;
}

.floating-cover {
    width: 100%;
    border-radius: 10px;
}

.ouija {
    margin-top: 60px;
    text-align: center;
    color: #f8f4ec;
}

.ouija-title {
    font-size: 2rem;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.ouija-subtitle {
    font-size: 0.95rem;
    color: #c9b79a;
    margin-bottom: 24px;
}
.ouija-board {
    position: relative;
    margin: 0 auto;

    width: 100%;
    max-width: 700px;
    aspect-ratio: 16/9; /* Mantém proporção perfeita */

    padding: 0;
    border-radius: 20px;

    background: url('/img/ouija.jpg') no-repeat center center;
    background-size: cover; /* MOSTRA A IMAGEM DO JEITO CERTO */

    box-shadow: 0 0 40px rgba(0,0,0,0.8);
    border: 1px solid rgba(255, 220, 180, 0.18);

    overflow: hidden;
}

.ouija-board::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='160' height='160' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 80 Q80 0 160 80 T320 80' stroke='%239c7a4a' stroke-width='0.3' fill='none'/%3E%3C/svg%3E");
    opacity: 0.18;
    mix-blend-mode: soft-light;
    pointer-events: none;
}

.ouija-letters {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 6px;
    position: relative;
    z-index: 2;
}

.ouija-letters div {
    padding: 6px 0;
    font-family: "Cinzel", serif;
    font-size: 1rem;
    letter-spacing: 0.12em;
    color: #f2e3c7;
    text-shadow: 0 0 4px rgba(0,0,0,0.8);
}

.ouija-row {
    margin-top: 10px;
    display: flex;
    justify-content: center;
    gap: 16px;
    position: relative;
    z-index: 2;
}

.ouija-key {
    padding: 6px 16px;
    border-radius: 999px;
    border: 1px solid rgba(255, 226, 179, 0.5);
    font-size: 0.8rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: #f2e3c7;
    background: rgba(0, 0, 0, 0.25);
    backdrop-filter: blur(3px);
}

.ouija-planchette {
    position: absolute;
    width: 60px;
    height: 60px;
    border-radius: 40px;
    border: 2px solid rgba(255, 238, 200, 0.7);
    background: radial-gradient(circle at 30% 30%, #fbe6ba, #8b5b2b);
    display: flex;
    align-items: center;
    justify-content: center;
    left: 50%;
    top: 70%;
    transform: translate(-50%, -50%);
    box-shadow:
        0 0 18px rgba(0,0,0,0.7),
        0 0 18px rgba(255, 222, 170, 0.4);
    z-index: 3;
    transition: transform 0.6s ease-in-out;
}

.ouija-planchette span {
    font-size: 1.4rem;
}

.ouija-planchette.glow {
    box-shadow:
        0 0 25px rgba(0,0,0,0.9),
        0 0 35px rgba(255, 255, 200, 0.7);
}

.btn-ouija {
    margin-top: 16px;
    padding: 8px 20px;
    border-radius: 999px;
    border: 1px solid #e3c28f;
    background: linear-gradient(135deg, #3a2514, #7c4c23);
    color: #f8f4ec;
    font-size: 0.9rem;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    cursor: pointer;
    margin-inline: 6px;
    transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.2s;
}

.btn-ouija:hover {
    transform: translateY(-1px);
    box-shadow: 0 0 12px rgba(0,0,0,0.7);
}

.btn-ouija-secondary {
    background: linear-gradient(135deg, #22130b, #4e3426);
    border-color: #b08a60;
}

.ouija-controls {
    margin-top: 10px;
}

.ouija-output-wrapper {
    margin-top: 18px;
    max-width: 600px;
    margin-inline: auto;
    text-align: left;
}

.ouija-output-label {
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.18em;
    color: #bca27b;
    margin-bottom: 4px;
}

.ouija-output {
    min-height: 60px;
    padding: 12px 14px;
    border-radius: 12px;
    background: rgba(5, 3, 1, 0.65);
    border: 1px solid rgba(255, 226, 179, 0.2);
    font-size: 0.95rem;
    line-height: 1.4;
    color: #f5ecde;
    box-shadow: inset 0 0 18px rgba(0,0,0,0.7);
    white-space: pre-wrap;
}

/* Responsivo */
@media (max-width: 600px) {
    .ouija-board {
        padding: 24px 12px 40px;
    }
    .ouija-letters div {
        font-size: 0.85rem;
    }
    .ouija-planchette {
        width: 50px;
        height: 50px;
    }
}

/* =========================================================
   SIDEBAR → BARRA SUPERIOR NO CELULAR (OPÇÃO B)
========================================================== */

@media (max-width: 900px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: fixed;
        top: 0;
        left: 0;

        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;

        padding: 10px 16px;
        border-right: none;
        border-bottom: 1px solid #222;

        z-index: 999;
    }

    .sidebar-logo {
        margin: 0;
    }

    .sidebar-logo img {
        width: 120px;
    }

    /* Links viram navbar horizontal */
    .sidebar a {
        font-size: 14px;
        padding: 8px 10px;
        margin: 0 4px;
        display: inline-block;
    }

    /* Conteúdo desce */
    .main {
        margin-left: 0 !important;
        padding-top: 100px !important;
        width: 100%;
    }
}














/* LISTA MENOS ESPAÇADA */
.episodes-list {
    display: flex;
    flex-direction: column;
    gap: 12px; /* de 20 para 12 */
}

/* CARD MAIS FINO E COMPACTO */
.episode-card {
    display: flex;
    gap: 14px; /* de 20 para 14 */
    padding: 10px 12px; /* de 15 para 10 */
    background: rgba(0,0,0,0.55);
    border-radius: 10px; /* menos arredondado = mais limpo */
    align-items: flex-start;
}

/* IMAGENS MAIS COMPACTAS */
.episode-img {
    width: 95px;  /* de 130 → 95 */
    border-radius: 8px;
}

/* TEXTO MAIS FIRME E ORGANIZADO */
.episode-info {
    flex: 1;
    padding-top: 2px; /* alinha com a imagem */
}

/* Ajuste do título */
.episode-info h2 {
    font-size: 1rem;
    margin: 0 0 4px 0;
}

/* Meta (data + duração) menor */
.episode-card-meta {
    font-size: .75rem;
    opacity: .7;
    margin-bottom: 4px;
    letter-spacing: .05em;
}

/* Descrição compacta */
.episode-desc {
    opacity: .75;
    font-size: .85rem;
    margin-bottom: 8px;
    line-height: 1.3;
}

/* Botão menor */
.ep-play {
    padding: 8px 12px;
    font-size: .85rem;
}

.curiosidade-area {
    width: 100%;
    display: flex;
    justify-content: center;
    margin: 40px 0;
}

.curiosidade-card {
    min-width: 320px;
    max-width: 600px;
    padding: 18px 25px;
    border-radius: 12px;
    background: rgba(0,0,0,0.55);
    border: 1px solid rgba(255,220,180,0.15);
    color: #f5e8d0;
    font-size: 1rem;
    font-family: 'Creepster', cursive;
    text-align: center;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 1.2s ease, transform 1.2s ease;
    box-shadow: 0 0 20px rgba(0,0,0,0.7);
}

/* card visível */
.curiosidade-card.show {
    opacity: 1;
    transform: translateY(0);
}

    </style>

</head>

<body>

<div class="layout">

    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="/img/logo.png" alt="Contos Noturnos">
        </div>

        <a href="/">Início</a>
        <a href="#ultimo">Último Episódio</a>
        <a href="#apoie">Apoie o Projeto</a>
        <a href="#insta">Instagram</a>
        <a href="#youtube">Youtube</a>
        <a href="/episodios">Todos os Episódios</a>
        <a href="https://open.spotify.com" target="_blank">🎧 Spotify</a>
    </div>

    <div class="main">
    <div class="content-wrapper">

        {{-- TODO O CONTEÚDO EXISTENTE DO SITE AQUI --}}
        @yield('content')

    </div>
</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector('.preview-container');
    const audio = document.getElementById('floating-audio');

    if(container && audio){
        container.addEventListener('mouseenter', () => {
            audio.currentTime = 0;
            audio.play();
        });

        container.addEventListener('mouseleave', () => {
            audio.pause();
            audio.currentTime = 0;
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const planchette = document.getElementById('ouija-planchette');
    const btnStart = document.getElementById('ouija-start');
    const btnStop = document.getElementById('ouija-stop');
    const output = document.getElementById('ouija-output');
    const letters = document.querySelectorAll('.ouija-letters div, .ouija-key');

    let sessionActive = false;
    let moveInterval = null;
    let typingTimeouts = [];

    const mensagensOuija = [
        "NÃO ESTÁ SOZINHO AÍ.\nELE SÓ ESPERA VOCÊ APAGAR A LUZ.",
        "ALGUÉM JÁ PASSOU ATRÁS DE VOCÊ HOJE.\nVOCÊ SÓ NÃO VIU.",
        "SEMPRE QUE VOCÊ SENTE UM AR FRIO,\nNÃO É O VENTO. É VISITA.",
        "A CASA LEMBRA DE COISAS QUE VOCÊ JÁ ESQUECEU.",
        "TEM UM CÔMODO QUE VOCÊ EVITA.\nELE SABE DISSO.",
        "VOCÊ JÁ OUVIU SEU NOME SUSSURRADO QUANDO ESTAVA SOZINHO.",
        "NÃO OLHE PARA TRÁS AGORA.\nELE QUER QUE VOCÊ OLHE.",
        "ALGUMAS SOMBRAS NÃO SÃO SUAS.",
        "VOCÊ NÃO ERROU O PASSO NA ESCADA.\nALGUÉM PUXOU DE LEVE.",
        "ELE ESTÁ ESCUTANDO VOCÊ LER ISSO."
    ];

    function limparTimeouts() {
        typingTimeouts.forEach(t => clearTimeout(t));
        typingTimeouts = [];
    }

    function moverPlanchetteAleatorio() {
        if (!sessionActive) return;

        const alvo = letters[Math.floor(Math.random() * letters.length)];
        const rectTabuleiro = document.querySelector('.ouija-board').getBoundingClientRect();
        const rectAlvo = alvo.getBoundingClientRect();

        const alvoX = rectAlvo.left + rectAlvo.width / 2;
        const alvoY = rectAlvo.top + rectAlvo.height / 2;

        const deslocX = alvoX - (rectTabuleiro.left + rectTabuleiro.width / 2);
        const deslocY = alvoY - (rectTabuleiro.top + rectTabuleiro.height / 2);

        planchette.style.transform = `translate(${deslocX}px, ${deslocY}px)`;
    }

    function digitarMensagem(msg) {
        output.textContent = "";
        const chars = msg.split("");
        chars.forEach((char, i) => {
            const t = setTimeout(() => {
                output.textContent += char;
            }, 60 * i);
            typingTimeouts.push(t);
        });
    }

    function iniciarSessao() {
        if (sessionActive) return;
        sessionActive = true;
        planchette.classList.add('glow');
        output.textContent = "O tabuleiro está escutando...\nFaça sua pergunta em silêncio.";

        const mensagemEscolhida = mensagensOuija[Math.floor(Math.random() * mensagensOuija.length)];

        moverPlanchetteAleatorio();
        moveInterval = setInterval(moverPlanchetteAleatorio, 900);

        const t = setTimeout(() => {
            digitarMensagem(mensagemEscolhida + "\n\nA sessão terminou... por enquanto.");
        }, 3500);
        typingTimeouts.push(t);
    }

    function encerrarSessao() {
        sessionActive = false;
        planchette.classList.remove('glow');
        planchette.style.transform = 'translate(-50%, -50%)';
        clearInterval(moveInterval);
        limparTimeouts();
        output.textContent = "O tabuleiro se calou.\nVocê está mesmo sozinho agora?";
    }

    btnStart.addEventListener('click', iniciarSessao);
    btnStop.addEventListener('click', encerrarSessao);
});

document.addEventListener("DOMContentLoaded", () => {
    
    const mensagens = @json($curiosidades ?? []); // vindo do controller
    const card = document.getElementById('curiosidade-card');
    const texto = document.getElementById('curiosidade-texto');

    let index = 0;

    function mostrarProxima() {

        // seta o texto
        texto.textContent = mensagens[index];

        // aparece
        card.classList.add("show");

        // depois de 4 segundos, some
        setTimeout(() => {
            card.classList.remove("show");
        }, 4000);

        // depois de 6 segundos, troca para próxima
        setTimeout(() => {
            index = (index + 1) % mensagens.length;
            mostrarProxima();
        }, 6000);
    }

    mostrarProxima();
});
</script>


</body>
</html>

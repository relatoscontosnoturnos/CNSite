<?php

namespace App\Http\Controllers;

use App\Services\SpotifyService;

class HomeController extends Controller
{
    public function index(SpotifyService $spotify)
    {
        // 🔥 Spotify: busca o podcast e o último episódio
        $showId = env('SPOTIFY_SHOW_ID');
        $data = $spotify->getShow($showId);

        $podcast = $data['name'] ?? 'Podcast';
        $lastEpisode = $data['episodes']['items'][0] ?? null;
        $episode_preview_url = $lastEpisode['audio_preview_url'] ?? null;
        $episode_spotify_url = $lastEpisode['external_urls']['spotify'] ?? null;

        // 🔥 Curiosidades que vão aparecer nos cards
        $curiosidades = [
            " O episódio mais ouvido do Contos Noturnos foi gravado às 3h da manhã.",
            " Um ouvinte relatou ter ouvido passos enquanto ouvia o podcast.",
            " 60% dos ouvintes dizem que escutam Contos Noturnos no escuro.",
            " A primeira história narrada no podcast nunca foi publicada oficialmente.",
            " Alguns fãs afirmam ouvir cochichos ao fundo de certos episódios…"
        ];

        return view('home', compact(
            'podcast',
            'lastEpisode',
            'episode_preview_url',
            'episode_spotify_url',
            'curiosidades'
        ));
    }
}

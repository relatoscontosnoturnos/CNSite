<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EpisodeController extends Controller
{
    public function index()
    {
        // Token do Spotify (CLIENT CREDENTIALS FLOW)
        $token = $this->getSpotifyToken();

        // Buscar episódios (ajustado ao seu SHOW_ID)
        $response = Http::withToken($token)
            ->get("https://api.spotify.com/v1/shows/" . env('SPOTIFY_SHOW_ID') . "/episodes", [
                'limit' => 50,
                'market' => 'BR'
            ]);

        $episodes = $response->json()['items'] ?? [];

        return view('episodes.index', compact('episodes'));
    }

    private function getSpotifyToken()
    {
        $clientId = env('SPOTIFY_CLIENT_ID');
        $clientSecret = env('SPOTIFY_CLIENT_SECRET');

        $response = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ]);

        return $response->json()['access_token'];
    }
}

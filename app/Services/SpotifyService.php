<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SpotifyService
{
    public function getToken()
    {
        return Cache::remember('spotify_token', 3500, function () {
            $id = env('SPOTIFY_CLIENT_ID');
            $secret = env('SPOTIFY_CLIENT_SECRET');

            $response = Http::asForm()
                ->withBasicAuth($id, $secret)
                ->post('https://accounts.spotify.com/api/token', [
                    'grant_type' => 'client_credentials'
                ]);

            return $response['access_token'];
        });
    }

    public function getShow($showId)
    {
        $token = $this->getToken();

        return Http::withToken($token)
            ->get("https://api.spotify.com/v1/shows/{$showId}", [
                'market' => 'BR'
            ])
            ->json();
    }
}

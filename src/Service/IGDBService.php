<?php
// src/Service/IGDBService.php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class IGDBService
{
    private $client;
    private $clientId;
    private $clientSecret;
    private $token;

    public function __construct(HttpClientInterface $client, string $clientId, string $clientSecret)
    {
        $this->client = $client;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    // Récupérer le token d'accès OAuth
    private function fetchAccessToken(): void
    {
        $response = $this->client->request('POST', 'https://id.twitch.tv/oauth2/token', [
            'body' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'grant_type' => 'client_credentials',
            ],
        ]);

        $data = $response->toArray();
        $this->token = $data['access_token'];
    }

    // Méthode pour effectuer des requêtes à l'API IGDB
    public function getGames(string $searchQuery): array
    {
        if (!$this->token) {
            $this->fetchAccessToken();
        }

        $response = $this->client->request('POST', 'https://api.igdb.com/v4/games', [
            'headers' => [
                'Client-ID' => $this->clientId,
                'Authorization' => 'Bearer ' . $this->token,
            ],
            'body' => "search \"$searchQuery\"; fields name, summary, release_dates, platforms, genres;",
        ]);

        return $response->toArray();
    }
}

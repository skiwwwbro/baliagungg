<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoogleReviewService
{
    public function getReviews()
    {
        $placeId = 'ChIJG96quldD0i0RCg_rV71LXTc';

        $response = Http::get(
            'https://maps.googleapis.com/maps/api/place/details/json',
            [
                'place_id' => $placeId,
                'fields' => 'name,rating,reviews',
                'key' => env('GOOGLE_MAPS_API_KEY')
            ]
        );

        return $response->json()['result']['reviews'] ?? [];
    }
}
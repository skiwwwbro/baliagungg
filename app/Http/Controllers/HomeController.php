<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $reviews = [];

        try {
            $response = Http::get('https://maps.googleapis.com/maps/api/place/details/json', [
                'place_id' => env('GOOGLE_PLACE_ID'),
                'fields' => 'reviews,rating,user_ratings_total',
                'key' => env('GOOGLE_MAPS_API_KEY'),
            ]);

            if ($response->successful()) {
                $data = $response->json();

                $reviews = $data['result']['reviews'] ?? [];
            }
        } catch (\Exception $e) {
            $reviews = [];
        }

        return view('pages.home', compact('reviews'));
    }
}
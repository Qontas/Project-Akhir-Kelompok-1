<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $city = $request->input('city', 'Jakarta');
        $apiKey = env('WEATHER_API_KEY');
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric");

        if ($response->successful()) {
            $data = $response->json();
            return view('weather', ['data' => $data]);
        } elseif ($response->clientError()) {
            return view('weather', ['error' => 'City not found or invalid API key.']);
        } else {
            return view('weather', ['error' => 'Unable to fetch weather data.']);
        }
    }
}

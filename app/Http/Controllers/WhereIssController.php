<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client; 
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Dnsimmons\OpenWeather\OpenWeather;

class WhereIssController extends Controller
{
    //
    public function issLocation(Request $request)
    {
        $timestamps = $this->setTimestamps(strtotime($request->timestamp));
        
        $endpoint = 'positions?timestamps='. $timestamps .'&units=miles';

        $url = 'https://api.wheretheiss.at/v1/satellites/25544/';

        //Initialize Guzzle Client
        $client = new \GuzzleHttp\Client(['base_uri' => $url]);
        $response = $client->request('GET', $endpoint, ['verify' => false]);
        $res = '';
        if($response->getStatusCode() == 200){
            $res = json_decode($response->getBody(), true);
        }

        $weather = new OpenWeather();
        $condition = [];
        foreach ($res as $key => $response) {
            // code...
            try {
                $result = $weather->getCurrentWeatherByCoords($response['latitude'], $response['longitude'], 'kelvin');
            } catch (\Exception $e) {
                $result = [];
                continue;
            }
            $condition[$key] = $result;
        }
        return view('location', compact('res', 'condition'));
    }

    public static function issPeople()
    {
        $url = 'http://api.open-notify.org/astros.json';

        //Initialize Guzzle Client
        $client = new \GuzzleHttp\Client(['base_uri' => $url]);
        $response = $client->request('GET');
        $res = '';
        if($response->getStatusCode() == 200){
            $res = json_decode($response->getBody(), true);
        }
        return $res;
    }

    public function setTimestamps($timestamp)
    {
        $result = $timestamp - 3600;
        $temp2 = $timestamp - 3600;
        for($before = 0; $before < 5; $before ++) {
            $temp = $temp2;
            $temp2 = $temp + 600;
            $result = $result . ',' . $temp2; 
        }

        $result = $result . ',' . $timestamp;
        
        for($after = 0; $after < 6; $after ++) {
            $temp = $timestamp;
            $timestamp = $temp + 600;
            if ($timestamp == strtotime('now')) {
                break;
            }
            $result = $result . ',' . $timestamp; 
        }

        return $result;
    }

    public function isForecast($latitude, $longitude, $units)
    {
        
        
        return $result['condition'];
    }
}

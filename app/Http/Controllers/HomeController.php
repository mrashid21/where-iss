<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\WhereIssController;
use Dnsimmons\OpenWeather\OpenWeather;

class HomeController extends Controller
{
    public function index()
    {
        $people = WhereIssController::issPeople();
        return view('welcome', compact('people'));
    }
}

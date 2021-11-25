<?php
use GuzzleHttp\Client;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumeArcticleController extends Controller
{
    public function apiWithoutKey()
    { 
    $client = new \GuzzleHttp\Client();

        $url = "localhost/Adnen.Rebhi.Formation/public/api/articles";


        $response = $client->request('GET', $url);

        $responseBody = json_decode($response->getBody())->data->articles;


       return view('projects.apiwithoutkey', compact('responseBody'));
       // dd($responseBody);
    }
}

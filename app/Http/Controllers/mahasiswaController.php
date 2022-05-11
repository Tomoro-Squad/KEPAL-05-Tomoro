<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;
// use Illuminate\Support\Facades\Client;
use GuzzleHttp\Client;

class mahasiswaController extends Controller
{
    public function index(){
        $client = new Client();
        $response = $client->request('GET','http://localhost:9010/student/');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();

        $data = json_decode($body, true);

        return view('beranda',['data' => $data]);
        // $response = $http->request('GET', 'http://localhost:9010/student/');
        // return json_decode((string) $response->getBody(), true);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class SessionController extends Controller
{
    // TODO : Fix this Hit and trial
    public function checkuser(Request $request){
        $client = new \Google_Client();
        /*$httpClient = new \GuzzleHttp\Client([
            'proxy' => 'localhost:8000',
            'verify' => false, // otherwise HTTPS requests will fail.
        ]);*/
        
        //$client->setHttpClient($httpClient);
        
        //$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'].'/api/session' ;
        $redirect_uri = 'http://ec2-34-201-41-91.compute-1.amazonaws.com/api/session' ;
        $client->setRedirectUri($redirect_uri); 
        
        $client->setAuthConfig('../storage/client.json');
        $token = $client->fetchAccessTokenWithAuthCode($request->get('code'));
        return $token ;//User::all();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;

class SessionController extends Controller
{
    /**
     * When the User logs in the Client App this API checks if user is who it says it is
     * If yes then registers or selects the user returns a simplified User Object
     */
    public function checkuser(Request $request){
        $client = new \Google_Client();
        
        //Running in Local ??
        /*$client->setHttpClient(new \GuzzleHttp\Client([
            'proxy' => 'localhost:8000',
            'verify' => false, // otherwise HTTPS requests will fail.
        ]));*/
        
        $client->setAuthConfig('../storage/client.json');
        // TODO Put a try catch for unauthorized tokens
        $payload = $client->verifyIdToken($request->input('id_token'));
        
        
        $user = User::firstOrNew(['google_id' => $payload['sub']]);
        $user->name = $payload['name'];
        $user->google_id = $payload['sub'];
        $user->given_name = $payload['given_name'];
        $user->family_name = $payload['family_name'];
        $user->email = $payload['email'];
        $user->picture = $payload['picture'];
        $user->save();
        

        return $user ;
    }
}

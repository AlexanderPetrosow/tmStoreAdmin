<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tokens;
use GuzzleHttp\Client;

class Push extends Controller
{
    static function send(String $title, String $text, String $userId = '0') // array $ids, array $notification, ?array $data
    {
        $tokens = array();
        if($userId == '0'){
            $token = Tokens::all();
        } else {
            $token = Tokens::where('user_id', $userId)->get();
        }
        foreach ($token as $key) {
            array_push($tokens, $key['token']);
        }

        $client = new Client();

        $response = $client->post('https://fcm.googleapis.com/fcm/send', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key=' . env('FCM_API_KEY'),
            ],
            'json' => [
                "registration_ids" => $tokens,
                "notification" => array(
                    "body"=>mb_substr($text,0,40).'...',
                    "title"=>$title,
                    "subtitle"=>"Firebase Cloud Message Subtitle"
                ),
                "priority" => "high",
            ],
        ]);

        $responseBody = $response->getBody()->getContents();
        $responseData = json_decode($responseBody, true);

        if (isset($responseData['success']) && $responseData['success'] != 0) {
            return true;
        } else {
            $error = json_encode($responseData['results']);
            return 'Notification failed to send. Error: ' . $error;
        }
    }
}


// 'json' => [
//     "registration_ids" => $ids,
//     "notification" => $notification,
//     "priority" => "high",
//     "data" => $data
// ],
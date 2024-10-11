<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class ChatController extends Controller
{

    public function sendChat(Request $request)
    {
        $userMessage = $request->input('input');

        $responses = [
            'hello' => 'Hi! How Can I Assist You Today',
            'how are you' => 'I am just a robot, but I am here to help',
            'bye' => 'Goodbye! Have Nice Day',
            'default' => 'Sorry!, I Did not understand you, Can you say again',

        ];

        $response = $responses['default'];
        foreach ($responses as $key => $reply){
            if(stripos($userMessage, $key) !== false){
                $response = $reply;
                break;
            }
        }
        return response()->json($response);
    }

}

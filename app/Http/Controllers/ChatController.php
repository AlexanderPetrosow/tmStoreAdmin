<?php

namespace App\Http\Controllers;

use App\Events\adminChats;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat(){
        event(new adminChats);
    }
}

<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Channels;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function chat()
    {
        return view('chat');
    }

    public function send(Request $request)
    {
        $url = str_replace(url('/'), '', url()->previous());
        $uri_parts = explode('/', $url);
        $uri_tail = end($uri_parts);
        $user = User::find(Auth::id());
        event(new ChatEvent($request->message, $user, $uri_tail));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Chanel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChatMessage;

class ChatController extends Controller
{
    public function loadDashboard()
    {
        $all_users = User::where('id', '!=', Auth::user()->id)->get()->map(function ($user) {
            $user->avatar = 'https://avatars.dicebear.com/api/avataaars/' . $user->id . '.svg';
            return $user;
        });
        return view('dashboard', compact('all_users'));
    }

    public function checkChannel(Request $request)
    {
        $recipientId = $request->input('recipientId');
        $loggedInUserId = Auth::user()->id;

        $chanel = Chanel::where(function ($query) use ($recipientId, $loggedInUserId) {
            $query->where('user1_id', $loggedInUserId)->where('user2_id', $recipientId);
        })->orWhere(function ($query) use ($recipientId, $loggedInUserId) {
            $query->where('user1_id', $recipientId)->where('user2_id', $loggedInUserId);
        })->first();

        if ($chanel) {
            return response()->json(['chanelExits' => true, 'chanelName' => $chanel->name]);
        } else {
            return response()->json(['chanelExits' => false]);
        }
    }

    public function createChannel(Request $request)
    {
        $recipientId = $request->input('recipientId');
        $loggedInUserId = Auth::user()->id;
        try {
            $chanelName = 'chat-' . min($recipientId, $loggedInUserId) . '-' . max($recipientId, $loggedInUserId);
            $chanel = Chanel::create([
                'user1_id' => $loggedInUserId,
                'user2_id' => $recipientId,
                'name' => $chanelName,
            ]);
            return response()->json(['success' => true, 'chanelName' => $chanelName]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $chatMessage = ChatMessage::create([
            'sender_id' => Auth::id(),
            'recipient_id' => $request->recipient_id,
            'message' => $request->message,
        ]);

        return response()->json(['success' => true, 'message' => $chatMessage]);
    }
}

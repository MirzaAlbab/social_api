<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:255',
            'receiver_id' => 'required|exists:users,id',
            'sender_id' => 'required|exists:users,id', // Optional, if you want to allow sender_id to be set
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }
        // Create a new message
        $message = Message::create([
            'content' => $request->content,
            'receiver_id' => $request->receiver_id,
            'sender_id' => $request->sender_id, // Assuming sender_id is the user sending the message
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully',
            'data' => $message,
        ], 201);
    }

    public function show($id)
    {
        // Fetch a single message by ID
        $message = Message::with(['sender', 'receiver'])->find($id);
        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $message,
        ], 200);
    }

    public function getMessagesByUser($userId)
    {
        // Fetch messages for a specific user
        $messages = Message::where('receiver_id', $userId)
            ->with(['sender'])
            ->get();

        if ($messages->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No messages found for this user',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Messages retrieved successfully',
            'data' => $messages,
        ], 200);
    }

    public function destroy($id)
    {
        // Find the message by ID
        $message = Message::find($id);
        if (!$message) {
            return response()->json([
                'success' => false,
                'message' => 'Message not found',
            ], 404);
        }

        // Delete the message
        $message->delete();

        return response()->json([
            'success' => true,
            'message' => 'Message deleted successfully',
        ], 200);
    }
}

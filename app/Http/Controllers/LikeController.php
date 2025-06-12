<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Validator;


class LikeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $like = Like::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Like added successfully',
            'data' => $like,
        ], 201);
    }

    public function destroy($id)
    {
        $like = Like::find($id);
        if (!$like) {
            return response()->json(['error' => 'Like not found'], 404);
        }

        $like->delete();

        return response()->json([
            'success' => true,
            'message' => 'Like removed successfully',
        ], 200);
    }
}

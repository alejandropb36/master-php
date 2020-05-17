<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = \Auth::user();
        $likes = Like::orderBy('id', 'desc')
        ->where('user_id' , $user->id)
        ->paginate(5);

        return view('like.index', [
            'likes' => $likes
        ]);
    }

    public function like($imageId) {
        $user = \Auth::user();


        $issetLike = Like::where(['user_id' => $user->id, 'image_id' => $imageId])->count();
        if ($issetLike == 0) {

            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = $imageId;
    
            $like->save();
            return response()->json([
                'like' => $like
            ], 200);
        }

        return response()->json([
            'message' => 'El like ya existe'
        ], 400);
    }

    public function disLike($imageId) {
        $user = \Auth::user();

        $like = Like::where(['user_id' => $user->id, 'image_id' => $imageId])->first();
        if ($like) {
            $like->delete();

            return response()->json([
                'like' => $like,
                'message' => 'Has dado dislike correctamente!'
            ], 200);
        }

        return response()->json([
            'message' => 'El like no existe'
        ], 400);
    }

    
}

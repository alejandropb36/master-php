<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'image_id' => 'required|integer',
            'content' => 'required|string'
        ]);

        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        $comment = new Comment();
        
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        $comment->save();

        return redirect()->route('image.detail', ['id' => $image_id])
            ->with(['message' => 'El commentario se inserto correctamente']);
    }

    public function delete($id) {
        $user = \Auth::user();
        $comment = Comment::find($id);
        
        if ($comment->user_id == $user->id || $comment->image->user_id == $user->id) {
            $comment->delete();
            return redirect()->route('image.detail', ['id' => $comment->image->id])
                ->with(['message' => 'El commentario se ha eliminado correctamente']);
        }

        return redirect()->route('image.detail', ['id' => $comment->image->id])
                ->with(['message' => 'No puedes borrar este commentario']);
    }
}

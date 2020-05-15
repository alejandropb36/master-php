<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request) {
        $image_id = $request->input('image_id');
        $content = $request->input('content');
        
        
        $this->validate($request, [
            'image_id' => 'required|integer',
            'content' => 'required|string'
        ]);


    }
}

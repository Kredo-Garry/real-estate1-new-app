<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment){
        $this->comment = $comment;
    }

    public function index(){
        // $all_comments = $this->comment->latest()-get();
        // return view('users.index')->with('all_comments', $all_comments);
    }

    public function store(Request $request, $property_id){
        $request->validate([
           'property_comment' . $property_id => 'required|max:150' 
        ]);

        $this->comment->user_id = Auth::user()->id;
        $this->comment->property_id = $property_id;
        $this->comment->body = $request->input('property_comment' . $property_id);
        $this->comment->save();

        return redirect()->back();
    }
}

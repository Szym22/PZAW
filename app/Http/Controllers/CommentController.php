<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create()
    {
        return view('publications.comments');
    }

    public function store(StoreCommentRequest $request) {
        $data = $request->validated();
        $data['author_id'] = Auth::id();

        $newComment = new Comment($data);
        $newComment->save();

        return redirect()->back();
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return redirect()->back();
    }

}

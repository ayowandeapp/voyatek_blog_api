<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Post;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Post $post)
    {

        $comment = $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
            'image_url' => $request->image_url ?? null
        ]);

        return response()->json($comment, 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Post $post, Comment $comment)
    {
        $comment = $post->comments()->where('id', $comment->id)->first();
        if (!$comment) {
            return response()->json('comment not found', 400);
        }
        $comment->update($request->validated());
        return response()->json($comment->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment = $post->comments()->where('id', $comment->id)->first();
        if (!$comment) {
            return response()->json('comment not found', 400);
        }
        $comment->delete();
        return response()->json(null, 204);
    }
}

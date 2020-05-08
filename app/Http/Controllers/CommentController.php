<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Http\Resources\Comment as CommentResource;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param CommentRequest $request
     * @return CommentResource
     */
    public function store(CommentRequest $request)
    {
        $comment = Comment::create([
            'question_id' => $request->questionId,
            'created_id' => $request->createdBy,
            'comment' => $request->comment
        ]);

        return new CommentResource($comment);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param CommentRequest $request
     * @param Comment $comment
     * @return CommentResource
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update([
            'question_id' => $request->questionId,
            'created_id' => $request->createdBy,
            'comment' => $request->comment
        ]);

        return new CommentResource($comment);
    }


}

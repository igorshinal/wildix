<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CompleteCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Comment $comment)
    {
        $comment->comment_content = $request->comment_content;
        $comment->save();

        return CommentResource::make($comment);
    }
}

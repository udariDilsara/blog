<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentValidationRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //show post list by Get Comment link
    public function index($postId)
    {
        //$comments = Comment::all();
        $post = Post::findOrFail($postId);
        $comments = $post->comments;
        //return Inertia::render("Article/ViewArticle", ['comments' => $comments]);
        //return Inertia::render("Comment/CommentList", ['comments' => $comments]);
        //return redirect()->route('post.postlist');
        return response()->json(['comments' => $comments]);
    }

    //this is wrong. not working 
    public function indexx()
    {
        $comments = Comment::all();
        //$postId = $comments->post_id;
        return redirect($comments)->route('post.postlist');
        //return Inertia::render("Article/PostList", ['comments' => $comments]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return Inertia::render("Comment/AddComment");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentValidationRequest $request, $postId)
    {

        $user_id = Auth::id();

        // $request->validate([

        //     'comment_body' => 'required|string',
        // ]);
        $request->validated();


        Comment::create([
            'user_id' => $user_id,
            'post_id' => $postId,
            'comment_body' => $request->input('comment_body'),
        ]);

        return response()->json(['message' => "save success"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // $comment =Comment::findOrFail($id);

        // return Inertia::render("Article/ViewComment",['comment'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $comment = Comment::findOrFail($id);
        //return Inertia::render("Comment/EditComment", ['comment' => $comment]);
        return response()->json(['comment' => $comment]);
    }
    // public function edit(Comment $comment)
    // {

    //     return Inertia::render("Comment/EditComment",['comment'=>$comment]);
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentValidationRequest $request, int $id)
    {
        // $request->validate([
        //     'comment_body' => 'required|string',
        // ]);
        $request->validated();
        $comment = Comment::findOrFail($id);
        $postId = $comment->post_id;
        $userId = Auth::id();
        $comment->update([
            'user_id' => $userId,
            'post_id' => $postId,
            'comment_body' => $request->input('comment_body'),
        ]);
        //return redirect()->route('post.view', ['postId' => $postId]);
        return response()->json(['message' => "update success", $postId], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $comment = Comment::findOrFail($id);
        $postId = $comment->post_id;
        $comment->delete();

        //return redirect()->route('post.view', ['postId' => $postId]);
        return response()->json(['message' => "delete success", $postId], 201);
    }
}

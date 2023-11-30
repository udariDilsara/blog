<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function create()
    {
        // $posts = Post::all();
        // return view('post.createpost',['posts'=>$posts]);
        return Inertia::render("Article/NewArticle");
    }
    // public function getView(Post $post){
    //    //dd($post);
    //    //$postid = $post->id;
    //    $postId = $post->id;
    //    $data=DB::table('posts')
    //    ->where('id', $postId)
    //    ->first();
    //     return Inertia::render("Article/ViewArticle",['post'=>$data]);
    // }

    //show post + comment
    public function getView(int $postId)
    {
        //dd($post);
        //$postid = $post->id;
        $post = Post::findOrFail($postId);
        $comments = $post->comments;

        return Inertia::render("Article/ViewArticle", ['post' => $post, 'comments' => $comments]);
    }

    // public function show($postId)
    // {
    //     $post = Post::with('comments')->findOrFail($postId);
    //     $comments = $post->comments;

    //     return Inertia::render('Article/ViewPost', [
    //         'post' => $post,
    //         'comments' => $comments,
    //     ]);
    // }

    public function getPostlist()
    {
        $posts = Post::all();
        return Inertia::render("Article/PostList", ['posts' => $posts]);
    }
    // public function getCommentList($postId)
    // {
    //     $post = Post::findOrFail($postId);
    //     $comments = $post->comments;
    //     //return Inertia::render("Article/ViewArticle", ['comments' => $comments]);
    //     return Redirect::route('post.postlist')->with('comments', $comments);
    // }
    public function store(Request $request)
    {
        //dd( Auth::id());

        $request->validate([
            'post_title' => 'required|string',
            'post_body' => 'required|string',
        ]);

        $id = Auth::id();
        Post::create([
            'user_id' => $id,
            'post_title' => $request->input('post_title'),
            'post_body' => $request->input('post_body'),
        ]);

        return redirect()->route('post.create');
    }
    public function edit(Post $post)
    {

        return Inertia::render("Article/EditArticle", ['post' => $post]);
        //return view('task.edit',['task'=>$task]);
    }
    public function update(Post $post, Request $request)
    {
        $request->validate([
            'post_title' => 'required|string',
            'post_body' => 'required|string',
        ]);
        //dd($post,$request);
        $id = Auth::id();
        $post->update([
            'user_id' => $id,
            'post_title' => $request->input('post_title'),
            'post_body' => $request->input('post_body'),
        ]);
        return redirect()->route('post.postlist');
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('post.postlist');
    }
}

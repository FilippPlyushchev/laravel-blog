<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.author_id')
                ->select('posts.*', 'users.name')
                ->orWhere('title', 'like', '%'.$request->search.'%')
                ->orWhere('users.name', 'like', '%'.$request->search.'%')
                ->orderBy('posts.created_at', 'desc')
                ->get();
        }else{
            $posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.author_id')
                ->select('posts.*', 'users.name')
                ->orderBy('posts.created_at', 'desc')
                ->paginate(4);
        }

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->short_title = Str::length($request->title) > 30 ? Str::substr($request->title, 0, 30) . '...' : $request->title;
        $post->description = $request->description;
        $post->author_id = auth()->user()->id;

        if($request->img){
            $path = \Storage::putFile('public', $request->img);
            $url = \Storage::url($path);
            $post->img = $url;
        }

        $post->save();

         return redirect()->route('post.index')->with('success', 'Пост успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|void
     */
    public function show($id)
    {
        $post = Post::join('users', 'users.id', '=', 'posts.author_id')->find($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|void
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->short_title = Str::length($request->title) > 30 ? Str::substr($request->title, 0, 30) . '...' : $request->title;
        $post->description = $request->description;

        if($request->img){
            $path = \Storage::putFile('public', $request->img);
            $url = \Storage::url($path);
            $post->img = $url;
        }

        $post->update();

        return redirect()->route('post.show', ['post' => $post->post_id])->with('success', 'Пост успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Пост успешно удален');
    }
}

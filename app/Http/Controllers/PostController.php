<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $req
     * @return Application|Factory|View|Response
     */
    public function index(Request $req)
    {
        if($req->search){
            $posts = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.author_id')
                ->select('posts.*', 'users.name')
                ->orWhere('title', 'like', '%'.$req->search.'%')
                ->orWhere('users.name', 'like', '%'.$req->search.'%')
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
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}

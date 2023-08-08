<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

/**
 * Class PostsWebController
 * @package App\Http\Controllers
 */
class PostsWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('id', 'desc')->paginate(10);

        return view('posts.index', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * $posts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = new Posts();
        return view('posts.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Posts::$rules);
        $posts = Posts::create($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'posts created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::find($id);

        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Posts::find($id);

        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  posts $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Posts::$rules);
        $posts = Posts::where('id',$id)->first();
        $posts->update($request->all());
        return redirect()->route('posts.index')
            ->with('success', 'posts updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $posts = Posts::find($id)->delete();

        return redirect()->route('posts.index')
            ->with('success', 'posts deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'featured' => 'image|nullable',
            'category' => 'required'
        ]);

        if($request->hasFile('featured')) {
            //get file name with extension
            $filenameWithExt = $request->file('featured')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('featured')->getClientOriginalExtension();

            $fileNameToStore = $filename. '_' .time().'.'.$extension;

            $path = $request->file('featured')->storeAs('public/cover_images', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

		$post = new Post;
		$post->title = $request->title;
		$post->content = $request->content;
		$post->featured = $fileNameToStore;
        $post->category_id = $request->category;
		$post->save();

		return redirect(route('posts.index'))->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit')->with('post', $post)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'featured' => 'image|nullable',
            'category' => 'required',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;

        if($request->hasFile('featured')) {
            //get file name with extension
            $filenameWithExt = $request->file('featured')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('featured')->getClientOriginalExtension();

            $fileNameToStore = $filename. '_' .time().'.'.$extension;

            $path = $request->file('featured')->storeAs('public/cover_images', $fileNameToStore);

            $post->featured = $fileNameToStore;
        }

        $post->category_id = $request->category;
        $post->save();

        return redirect(route('posts.index'))->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        //delete image after deleting post
        

        return redirect(route('posts.index'))->with('success', 'Post deleted');
    }
}
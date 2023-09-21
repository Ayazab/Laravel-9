<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //59.
        //$posts=Post::all();
        //61. pagination
        //$posts = Post::paginate(5);
        //$posts = Post::simplePaginate(5);
        $posts = Post::withTrashed()->simplePaginate(5);
        return view('posts.index', ['posts'=> $posts]);
        //return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //46.

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //52. 53.
        $request->validate([
            'title'=>'required | min:3 | max: 50',
            'description'=>'required | min: 10 | max:70',
            'is_active'=>'required'

        ]);

        //55.

        //Post::create($request->all()); // all values insert
        Post::create([
            'title'=>$request->title,
            'user_id'=>1,
            'description'=>$request->description,
            'is_published'=>$request->is_published,
            'is_active'=>$request->is_active,
        ]);


        //57.
        $request->session()->flash('alert-success', "Post created successfully");

        //58.
        return redirect()->route('posts.create'); //old version

        //59.
        return to_route('posts.create'); //new version

        // if($request->session()->has('alert-success')){
        //     return 'set';
        // }else{
        //     return 'not set';
        // }

        // dd('values saved');

        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //64
        $post= Post::find($id);
        if(!$post){
            abort(404,'post not found');
        }
        return view('posts.show',['post' => $post]);
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //66.
        $post= Post::find($id);
        if(!$post){
            abort(404,'post not found');
        }
        return view('posts.edit', compact('post'));
        return $id;
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
        //66. 67.
        $request->validate([
            'title'=>'required | min:3 | max: 50',
            'description'=>'required | min: 10 | max:70',
            'is_active'=>'required'

        ]);

        $post= Post::find($id);
        if(!$post){
            abort(404,'post not found');
        }
        $post->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_published'=>$request->is_published,
            'is_active'=>$request->is_active,
        ]);
        $request->session()->flash('alert-info', "Post updated successfully");
        return to_route('posts.index');
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //68.
        $post= Post::find($id);
        if(!$post){
            abort(404,'post not found');
        }
        $post->delete();
        request()->session()->flash('alert-danger', "Post deleted successfully");
        return to_route('posts.index');
        return $id;
    }

    public function softDelete(Request $request, $id){
        $post= Post::onlyTrashed()->find($id);
        if(!$post){
            abort(404,'post not found');
        }
        $post->update([
            'deleted_at'=>null
        ]);
        $request->session()->flash('alert-message', "Post recovered successfully");
        return to_route('posts.index');
    }



    ///////////75.

    public function getPosts(){

        //return DB::select('select * from posts');
        return DB::select('select * from posts where title = ?', ['ayyaj']);

        return DB::table('posts')->where('id',1)->get();

    }
}

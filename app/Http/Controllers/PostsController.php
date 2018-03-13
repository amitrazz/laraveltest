<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',post::all());        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $tags       = Tag::all();
        $categories = Category::all();
        if($categories->count() == 0 ){
            session::flash('info','You must have some Categories to create a post');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'         =>  'required',
            'featured'      =>  'required|image',
            'content'       =>  'required',
            'category_id'   =>  'required',
            'tags'           =>  'required'
        ]);
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([
            'title'        =>   $request->title,
            'featured'     =>   'uploads/posts/'.$featured_new_name,
            'content'      =>   $request->content,
            'category_id'  =>   $request->category_id,
            'slug'         =>   str_slug($request->title)

        ]);

        $post->tags()->attach($request->tags);

        session::flash('success','You succesfuly created a post');
        return redirect()->back();
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
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
        
        $this->validate($request,[
            'title'         =>  'required',
            'content'       =>  'required',
            'category_id'   =>  'required'
        ]);

        $post   =   post::find($id);
        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;

        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        session::flash('success','Post updated succesfully!');
        return redirect()->route('posts');
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
        session::flash('success','post has been Trashed succesfully!');
        return redirect()->route('posts');

    }
    public function trashed(){
        $posts = post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }
    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
      session::flash('success','Post has been restored succesfully!');
      return redirect()->route('posts');
    }
    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();

        $post->forceDelete();
        session::flash('success','post deleted permanetly!');
        return redirect()->back();
    }
}

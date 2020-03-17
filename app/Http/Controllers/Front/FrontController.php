<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {
        view()->share('categories',Category::get());
        view()->share('pposts',Post::inRandomOrder()->take(6)->get());
    }

    public function index(){
        $slides = Post::where('slide',1)->orderBy('id','DESC')->get();
        $posts = Post::orderBy('id','DESC')->paginate(12);
        
        return view('front.index',compact('posts','slides'));
    }

    public function single($cslug,$pslug){
        $category = Category::where('slug',$cslug)->first() ?? abort(404);
       
        $post = Post::where('category_id',$category->id)->where('slug',$pslug)->first() ?? abort(404);
      
        $nextpost = Post::where('id', '>', $post->id)->orderBy('id')->first() ;
        
        $previouspost = Post::where('id', '<', $post->id)->orderBy('id','desc')->first();
        
        $comments = Comment::where('approve',1)->where('post_id',$post->id)->get();
        
        return view('front.single',compact('post','nextpost','previouspost','comments'));
    }

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first() ?? abort(404);
        $posts = Post::where('category_id',$category->id)->paginate(12) ?? abort(404);
        return view('front.category',compact('posts','category'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function search(Request $request)
    {
        $search = Post::where('title','LIKE','%'.$request->search.'%')->get();
        return response()->json($search);
    }

   
    public function cfetch(Request $request)
    {
        $request->validate([
            'name' => 'required | min:3',
            'email' =>'required | min:3 |email',
            'message' => 'required | min: 10'
        ]);

        $reply = new Reply();
        $reply->comment_id = $request->id;
        $reply->name = $request->name;
        $reply->email = $request->email;
        $reply->reply = $request->message;
        $reply->save();

        return response()->json(['success' => true]);
        
    }


    


}

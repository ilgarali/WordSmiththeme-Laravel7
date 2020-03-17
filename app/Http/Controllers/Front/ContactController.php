<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Post;


class ContactController extends Controller
{
    public function __construct()
    {
        view()->share('categories',Category::get());
        view()->share('pposts',Post::inRandomOrder()->take(6)->get());
    }



    public function contact()
    {
        return view('front.contact');
    
    }

    public function contactus(Request $request)
    {
        $request->validate([
            'cName'=>'required | min:3',
            'cEmail'=>'required | min:5 | email',
            'cMessage'=>'required | min:5 | max: 999'
        ]);
        $contact = new Contact();
        $contact->name = $request->cName;
        $contact->email = $request->cEmail;
        $contact->website = $request->cWebsite;
        $contact->content = $request->cMessage;

        $contact->save();

        return redirect()->back()->with('success','You have sended your message successfully');
      
    }


    public function comment(Request $request)
    {
        
        $request->validate([
            'cName'=>'required | min:3',
            'cEmail'=>'required | min:5 | email',
            'cMessage'=>'required | min:5 | max: 999'
        ]);
        $comment = new Comment();
       
        $comment->post_id = $request->post_id;
        
        $comment->email = $request->cEmail;
        $comment->name = $request->cName;
        $comment->comment = $request->cMessage;
        $comment->save();

        return redirect()->back()->with('success','You have sended your comment successfully');
      
    }
}

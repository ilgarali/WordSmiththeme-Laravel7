<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('back.index');
    }

    public function contact()
    {
        $contacts = Contact::latest()->paginate();
        return view('back.contact',compact('contacts'));
    }

    public function cdelete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success','You have deleted contact message successfully');
    }
}

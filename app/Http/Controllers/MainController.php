<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Home Page';
        $subtitle = '<i>Welcome</i>';
        $users = ['Tom', 'Bob', 'Mark'];

        return view('index', compact('title', 'subtitle', 'users'));
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ]);
        
        //dd($request->all());
        //dd($request->name);

        // send email!!!!
        return 'sendEmail';
    }
}
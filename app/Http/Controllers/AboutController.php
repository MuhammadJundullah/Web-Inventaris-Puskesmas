<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{

    public function index()
    {
        $title = "About this site";

        $username = session("username");

        return view("about", compact("title", "username"));
    }

}
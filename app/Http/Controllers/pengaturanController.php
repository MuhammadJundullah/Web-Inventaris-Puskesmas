<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pengaturanController extends Controller
{
    public function index() {
        $title = "ekboh";
        $username = session('username');

        return view('pengaturan', compact('title', 'username'));
    }
}

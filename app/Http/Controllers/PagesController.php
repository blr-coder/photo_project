<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $albums = Album::all();
        return view('index', compact('albums'));
    }
}

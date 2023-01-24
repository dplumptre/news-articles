<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $data = Article::orderBy('id','Desc')->get();
        return view('welcome',compact('data'));
    }



}
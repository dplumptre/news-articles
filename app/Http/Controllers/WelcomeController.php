<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WelcomeController extends Controller
{
    public function index(){
        $data = Article::latest()->paginate(6);
        return view('welcome',compact('data'));
    }
    
    public function search(Request $request){
        $keyword = $request->keyword;
        $date = $request->date;
    
        $data = Article::where('title', 'LIKE', "%$keyword%")
            ->orWhere('description', 'LIKE', "%$keyword%")
            ->orWhere('title', 'LIKE', "%$keyword%")
            ->orWhere('author', 'LIKE', "%$keyword%")
            ->orWhere('source', 'LIKE', "%$keyword%")
            ->whereDate('publishedAt', $date)
            ->latest()
            ->paginate(10);
           // dd($data);
           return view('welcome',compact('data'));

    }


}
<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WelcomeController extends Controller
{
    public function index(){
        $data = Article::latest()->simplePaginate(10);
        return view('welcome',compact('data'));
    }
    
    public function search(Request $request){
        $keyword = $request->input('keyword');
        $date = $request->input('date');

       

        if ($keyword === null && $date !== null ) {
            // Perform search using date
            //dd('key');
            $data = Article::whereDate('publishedAt', $date)
            ->latest()
            ->simplePaginate(10);
        } elseif($date === null && $keyword !== null ) {
            //dd('date');
            $data = Article::where('title', 'LIKE', "%$keyword%")
            ->orWhere('description', 'LIKE', "%$keyword%")
            ->orWhere('title', 'LIKE', "%$keyword%")
            ->orWhere('author', 'LIKE', "%$keyword%")
            ->orWhere('source', 'LIKE', "%$keyword%")->latest()
            ->simplePaginate(10);
        } elseif($date === null && $keyword === null) {
            //dd('swsw');
            $data = Article::simplePaginate(10);
        }else{
            //dd('else');
            $data = Article::where('title', 'LIKE', "%$keyword%")
            ->orWhere('description', 'LIKE', "%$keyword%")
            ->orWhere('title', 'LIKE', "%$keyword%")
            ->orWhere('author', 'LIKE', "%$keyword%")
            ->orWhere('source', 'LIKE', "%$keyword%")
            ->whereDate('publishedAt', $date)
            ->latest()
            ->simplePaginate(10);
        }
        
    

           // dd($data);
           return view('welcome',compact('data'));

    }


}
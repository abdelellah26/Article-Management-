<?php

namespace App\Http\Controllers\client\article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $article;

    public function __construct(){
      $this->article=new Article ();
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return $this->article->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      return $this->article->create($request->all());
    }
}

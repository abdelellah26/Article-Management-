<?php

namespace App\Http\Controllers\admin\articles;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Sub_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(){
        $neighb = DB::table('articles')
        ->join('sub_category', 'sub_categories.id', '=', 'articles.id_sub_category ')
        ->join('categorie', 'categorie.id','=','articles.id_category')
        ->select(
            'categories.name',
            'sub_categories.name',
            'articles.Article_Name',
            'articles.titre',
            'articles.contenu'
        )
        ->get();
        return response()->json(['status' => true, 'data' => $neighb]);
    }

    public function store(ArticleRequest $request){
        $formFields=$request->validated();
        $neighb = Article::create($formFields);
        return response()->json( $neighb);
    }

    public function show($id){
        $neighb=Article::find($id);
        $category=Sub_categorie::all();

        return response()->json([$neighb, $category]);
    }

    public function update(ArticleRequest $request,$id){
        $formFields = $request->validated();
        $neighb=Article::find($id);
        $neighb->update($formFields);

        return response()->json(['status' => true, 'message' => 'Article Updated Successfully']);
    }

    public function destroy($id){
        $neighb=Article::findOrFail($id);
        $neighb->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers\admin\subCategories;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Categorie;
use App\Models\Sub_categorie;
use Illuminate\Support\Facades\DB;

class SubCategoyController extends Controller
{
    public function index(){
        $neighb = DB::table('sub_categories')
        ->join('categories', 'sub_categories.id_category', '=', 'categories.id')
        ->select(
            'sub_categories.id',
            'categories.name',
            'sub_categories.name'
        )
        ->get();
        return response()->json(['status' => true, 'data' => $neighb]);

    }

    public function store(SubCategoryRequest $request){
        $formFields=$request->validated();
        $neighb = Sub_categorie::create($formFields);
        return response()->json( $neighb);
    }

    public function show($id){
        $neighb=Sub_categorie::find($id);
        $category=Categorie::all();
        return response()->json([ $neighb, $category]);
    }

    public function update(SubCategoryRequest $request,$id){
        $formFields = $request->validated();
        $neighb=Sub_categorie::find($id);
        $neighb->update($formFields);

        return response()->json(['status' => true, 'message' => 'Sub Category Updated Successfully']);
    }

    public function destroy($id){
        $neighb=Sub_categorie::findOrFail($id);
        $neighb->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers\admin\categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categorie;

class CategoryController extends Controller
{
    public function index(){
        $neighb=Categorie::all();
        return response()->json($neighb);
    }

    public function store(CategoryRequest $request){
        $formFields=$request->validated();
        $neighb = Categorie::create($formFields);
        return response()->json( $neighb);
    }

    public function show($id){
        $neighb=Categorie::find($id);
        return response()->json( $neighb);
    }

    public function update(CategoryRequest $request,$id){
        $formFields = $request->validated();
        $neighb=Categorie::find($id);
        $neighb->update($formFields);

        return response()->json(['status' => true, 'message' => 'Category Updated Successfully']);
    }

    public function destroy($id){
        $neighb=Categorie::findOrFail($id);
        $neighb->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\Lookups\CategoryCollection;
use App\Models\Lookups\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CategoryCollection
     */
    public function index()
    {
        return new CategoryCollection(Category::all());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response(['errors' => $validator->errors()], 422);
        }

        return Category::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Category
     */
    public function show(Category $category)
    {
        return $category;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Category $category
     * @return Category
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return response(['errors' => $validator->errors()], 422);
        }

         $category->update($request->all());

         return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       /// $category->delete();
       // return "Category is successfully delete";
    }
}

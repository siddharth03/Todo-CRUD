<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\Request;
use App\Http\Requests\CreatecategoryRequest;
use function redirect;
use function view;

class categoryController extends Controller
{
    public function create()
    {
        $category = new category();
        return view('todo.addCategory', compact('category'));
    }
    public function index()
    {
       $category = category::all();
       return view('todo.indexCategory', compact('category'));
    }
     public function show()
    {
        
    }
    public function store(CreatecategoryRequest $request)
    {
        category::create($request->all());
        return redirect()
        ->back()
        ->with('message', "Succesfully added in category.");
    }
    public function edit($id)
    {
        $category = category::find($id);
        return view('todo.addCategory', compact('category'));
    }
    public function update($id, Request $request)
    {
        $category = category::find($id)->update($request->toArray());
        return redirect()
        ->back()
        ->with('message', "Succesfully updated in category.");  
    }
    public function destroy($id)
    {
        $category = category::find($id)->delete();
        return redirect()
        ->back()
        ->with('message', "Succesfully deleted in category."); 
    }
}
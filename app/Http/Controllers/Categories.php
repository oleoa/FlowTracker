<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class Categories extends Controller
{
  public function index(Request $request, $type = 'expense')
  {
    if($type != 'expense' && $type != 'income')
      return redirect()->route('categories', ['type' => 'expense']);
    $data['type'] = $type;
    
    $data['categories'] = Category::where('type', $type)->get();

    return view('categories', $data);
  }

  public function add(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|max:255',
      'type' => 'required|in:income,expense'
    ]);

    $category = new Category;
    $category->name = $validated['name'];
    $category->type = $validated['type'];
    $category->user = auth()->user()->id;
    $category->save();

    return redirect()->route('categories', ['type' => $validated['type']]);
  }

  public function delete(Request $request)
  {
    $validated = $request->validate([
      'id' => 'required|integer'
    ]);

    $category = Category::find($validated['id']);
    if(!$category)
      return redirect()->route('categories', ['type' => $request->input('type')??'income']);

    if($category->user == auth()->user()->id)
      $category->delete();

    return redirect()->route('categories', ['type' => $category->type]);
  }
}

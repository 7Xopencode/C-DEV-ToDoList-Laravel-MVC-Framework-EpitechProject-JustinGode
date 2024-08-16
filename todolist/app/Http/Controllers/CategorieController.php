<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
       {
           $categories = Categorie::all();
           return view('admin.categories.index', compact('categories'));
       }

       public function create()
       {
           return view('admin.categories.create');
       }

       public function store(Request $request)
       {
           $request->validate([
               'name' => 'required|string|max:255',
           ]);

           Categorie::create($request->all());
           return redirect()->route('categories.index')->with('success', 'Categorie created successfully.');
       }

       public function show(Categorie $category)
       {
           return view('admin.categories.show', compact('category'));
       }

       public function edit(Categorie $category)
       {
           return view('admin.categories.edit', compact('category'));
       }

       public function update(Request $request, Categorie $category)
       {
           $request->validate([
               'name' => 'required|string|max:255',
           ]);

           $category->update($request->all());
           return redirect()->route('categories.index')->with('success', 'Categorie updated successfully.');
       }

       public function destroy(Categorie $category)
       {
           $categorie->delete();
           return redirect()->route('categories.index')->with('success', 'Categorie deleted successfully.');
       }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(5);
        return view('categories.index', compact('categories'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('categories.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('home',session('current_profile'))->with('success', 'Catégorie ajoutée avec succès!');
    }

    // Afficher le formulaire d’édition
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

 
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès!');
    }

  
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès!');
    }
}
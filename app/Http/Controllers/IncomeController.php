<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller {
    public function index() {
        $incomes = Income::where('user_id', auth()->id())->get();
        return view('incomes.index', compact('incomes'));
    }

    public function create() {
        return view('incomes.create');
    }

    public function store(Request $request) {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        Income::create([
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        return redirect()->route('incomes.index')->with('success', 'Income added successfully!');
    }

    // Ajoutez les autres méthodes (show, edit, update, destroy) ici
}

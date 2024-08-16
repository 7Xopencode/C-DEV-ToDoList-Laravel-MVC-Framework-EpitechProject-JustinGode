<?php

namespace App\Http\Controllers;
use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function index()
    {
        $conditions = Condition::all();
        return view('admin.conditions.index', compact('conditions'));
    }

    public function create()
    {
        return view('admin.conditions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        Condition::create($validatedData);
    
        return redirect()->route('conditions.index')->with('success', 'Condition created successfully.');
    }

    public function edit(Condition $condition)
    {
        return view('admin.conditions.edit', compact('condition'));
    }

    public function update(Request $request, Condition $condition)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $condition->update($request->all());

        return redirect()->route('conditions.index')->with('success', 'Condition updated successfully.');
    }

    public function destroy(Condition $condition)
    {
        $condition->delete();
        return redirect()->route('conditions.index')->with('success', 'Condition deleted successfully.');
    }
}

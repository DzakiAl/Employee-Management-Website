<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::orderBy('id')->get();
        return view('position.index', ['positions' => $positions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'position_name' => ['required', 'string'],
            'salary_range' => ['required', 'string']
        ]);

        // Create a new department record in the database
        Position::create([
            'position_name' => $data['position_name'],
            'salary_range' => $data['salary_range']
        ]);

        return redirect()->route('position.index')->with('success', 'Position added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        return view('position.edit', ['position' => $position]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'position_name' => ['required', 'string'],
            'salary_range' => ['required', 'string']
        ]);

        // Update the position record in the database
        $position->update($data);

        return redirect()->route('position.index')->with('success', 'Position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        // Delete the position record from the database
        $position->delete();

        // Redirect to the posiiton index page with a success message
        return redirect()->route('position.index')->with('success', 'Position deleted successfully.');
    }
}

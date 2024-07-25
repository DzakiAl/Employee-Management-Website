<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::orderBy('id')->get();
        return view('department.index', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'department_name' => ['required', 'string']
        ]);

        // Create a new department record in the database
        Department::create([
            'department_name' => $data['department_name']
        ]);

        return redirect()->route('department.index')->with('success', 'Department added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('department.edit', ['department' => $department]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'department_name' => ['required', 'string']
        ]);

        // Update the department record in the database
        $department->update($data);

        return redirect()->route('department.index')->with('success', 'Department updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        // Delete the department record from the database
        $department->delete();

        // Redirect to the department index page with a success message
        return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
    }
}

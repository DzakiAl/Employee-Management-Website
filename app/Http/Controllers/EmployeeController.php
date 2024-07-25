<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('id')->get();
        return view('employee.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();

        return view('employee.create', ['departments' => $departments, 'positions' => $positions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'date_hired' => ['required', 'date'],
            'position' => ['required', 'integer'],
            'department' => ['required', 'integer'],
            'status' => ['required', 'string']
        ]);

        // Handle the file upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('photo'), $fileName);
            $data['photo'] = $fileName;
        }

        // Create a new employee record in the database
        Employee::create([
            'photo' => $data['photo'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'date_hired' => $data['date_hired'],
            'position_id' => $data['position'],
            'department_id' => $data['department'],
            'status' => $data['status']
        ]);

        return redirect()->route('employee.index')->with('success', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();

        return view('employee.edit', ['departments' => $departments, 'positions' => $positions, 'employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'date_hired' => ['required', 'date'],
            'position' => ['required', 'integer'],
            'department' => ['required', 'integer'],
            'status' => ['required', 'string'],
        ]);

        // Handle the file upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($employee->photo) {
                $oldPhotoPath = public_path('photo/' . $employee->photo);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }

            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('photo'), $fileName);
            $data['photo'] = $fileName;
        }

        // Update the employee record in the database
        $employee->update($data);

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        // Check if the employee has a photo and delete it from the filesystem
        if ($employee->photo) {
            $photoPath = public_path('photo/' . $employee->photo);
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        // Delete the employee record from the database
        $employee->delete();

        // Redirect to the employee index page with a success message
        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }
}
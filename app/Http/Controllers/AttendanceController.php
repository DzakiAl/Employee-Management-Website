<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterDate = $request->input('filter_date', now()->format('Y-m-d'));

        $query = Attendance::query();

        // Check if a date filter is applied
        if ($filterDate) {
            $query->whereDate('date', $filterDate);
        }

        $attendances = $query->orderBy('date')->get();
        return view('attendance.index', ['attendances' => $attendances]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();

        return view('attendance.create', ['employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'employee_id' => ['required', 'string'],
            'date' => ['required', 'date'],
            'check_in_time' => ['nullable', 'string'],
            'check_out_time' => ['nullable', 'string'],
            'status' => ['required', 'string']
        ]);

        // Create a new attendance record in the database
        Attendance::create([
            'employee_id' => $data['employee_id'],
            'date' => $data['date'],
            'check_in_time' => $data['check_in_time'],
            'check_out_time' => $data['check_out_time'],
            'status' => $data['status']
        ]);

        return redirect()->route('attendance.index')->with('success', 'Attendance added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();

        return view('attendance.edit', ['attendance' => $attendance, 'employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'employee_id' => ['required', 'string'],
            'date' => ['required', 'date'],
            'check_in_time' => ['nullable', 'string'],
            'check_out_time' => ['nullable', 'string'],
            'status' => ['required', 'string']
        ]);

        // Update the attendance record in the database
        $attendance->update($data);

        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        // Delete the attendance record from the database
        $attendance->delete();

        // Redirect to the attendance index page with a success message
        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::orderBy('id')->get();
        return view('salary.index', ['salaries' => $salaries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        return view('salary.create', ['employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'employee_id' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
            'bonus' => ['required', 'numeric'],
            'deductions' => ['required', 'numeric'],
            'pay_date' => ['required', 'string']
        ]);

        // Calculate the net pay
        $data['net_pay'] = $data['amount'] + $data['bonus'] - $data['deductions'];

        // Create a new salary record in the database
        Salary::create([
            'employee_id' => $data['employee_id'],
            'amount' => $data['amount'],
            'bonus' => $data['bonus'],
            'deductions' => $data['deductions'],
            'net_pay' => $data['net_pay'],
            'pay_date' => $data['pay_date'],
        ]);

        return redirect()->route('salary.index')->with('success', 'Salary added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $employees = Employee::all();
        return view('salary.edit', ['salary' => $salary, 'employees' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'employee_id' => ['required', 'string'],
            'amount' => ['required', 'numeric'],
            'bonus' => ['required', 'numeric'],
            'deductions' => ['required', 'numeric'],
            'pay_date' => ['required', 'string']
        ]);

        // Calculate the net pay
        $data['net_pay'] = $data['amount'] + $data['bonus'] - $data['deductions'];

        // Update the salary record in the database
        $salary->update([
            'employee_id' => $data['employee_id'],
            'amount' => $data['amount'],
            'bonus' => $data['bonus'],
            'deductions' => $data['deductions'],
            'net_pay' => $data['net_pay'],
            'pay_date' => $data['pay_date'],
        ]);

        return redirect()->route('salary.index')->with('success', 'Salary updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        // Delete the salary record from the database
        $salary->delete();

        // Redirect to the salary index page with a success message
        return redirect()->route('salary.index')->with('success', 'Salary deleted successfully.');
    }
}
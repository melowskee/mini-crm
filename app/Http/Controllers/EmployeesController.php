<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Companies;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::latest()->paginate(10);

        return view('admin.employees.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::pluck('name', 'id');
        return view('admin.employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateEmployees($request);

        Employees::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(Employees $employees, $id)
    {
        $employee = $employees->find($id);
        $companies = Companies::pluck('name', 'id');
        return view('admin.employees.show', compact('employee', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(Employees $employees, $id)
    {
        $employee = $employees->find($id);
        $companies = Companies::pluck('name', 'id');
        return view('admin.employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employees $employees, $id)
    {
        $this->validateEmployees($request);

        $employees->find($id)->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employees $employees, $id)
    {
        $employees->find($id)->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }

    /**
     * validate Employees.
     *
     * @param $request
     */
    public function validateEmployees(Request $request)
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'company_id' => 'required',
        ]);

    }
}

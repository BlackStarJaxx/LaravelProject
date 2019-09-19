<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Employee::latest()->paginate(10);
        return view('admin.employees.index' , compact('data'))
            ->with('i',(request()->input('page', 1) -1) *10);


        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       =>    'required',
            'surname'    =>    'required',
            'company'    =>    'required',
            'email'      =>    'required',
            'phone'      =>    'required'
            ]);
        $form_data = array(
            'name' => $request->name,
            'surname' => $request->surname,
            'company' => $request->company,
            'email' => $request->email,
            'phone' =>$request->phone
        );
          Employee::create($form_data);
          return redirect()->route('admin.employees.index')
              ->with('success', 'Data Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $data = Employee::findOrfail($employee);
        return view('admin.employees.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('admin.employees.index')
            ->with('success', 'Data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee-> delete();
        return redirect()->route('admin.employees.index')
            ->with('success', 'Data is successfully delete!');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EmployeeController extends Controller
{
    public function index()
    {
        $data=Employee::paginate(5);
        return view('admin.employees.index' , compact('data'))
            ->with((request()->input('page')));

    }

    public function create()
    {
        $companies=Company::all();

        return view('admin.employees.create', ["companies"=>$companies]);

    }

    public function store(StoreEmployeeRequest $request)
    {
          $form_data = $request->validated();
          $form_data[
              "company_id"

              ] = $request->validated()['company'];


          Employee::create($form_data);
          return redirect()->route('admin.employees.index')
              ->with('success', 'Data Added successfully!');
    }

    public function show(Employee $employee)
    {
        $data = Employee::findOrfail($employee);
        return view('admin.employees.show',compact('data'));
    }

    public function edit(Employee $employee)
    {
        $companies=Company::all();

        return view('admin.employees.edit',compact('employee', 'companies'));

    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $form_data = $request->validated();
        $form_data[
        "company_id"

        ] = $request->validated()['company'];

        $employee->update($form_data);
        return redirect()->route('admin.employees.index')
            ->with('success', 'Data is successfully updated!');
    }

    public function destroy(Employee $employee)
    {
        $employee-> delete();
        return redirect()->route('admin.employees.index')
            ->with('success', 'Data is successfully delete!');

    }
}

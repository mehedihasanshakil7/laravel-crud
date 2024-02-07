<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request) {
        // fetch employees data from employees table
        if( $request->has('search')   ){
            $employee = Employee::where('name', 'like', '%'.$request->search.'%' )
                ->orWhere('job_title', 'like', '%'.$request->search.'%' )
                ->paginate(10);
        } else {
            $employee = Employee::paginate(10);
        }
        // pass employees data to view
        return view('employees.index')
            ->with('employees', $employee);
    }
    public function show($employeeId) {
        $employee = Employee::find($employeeId);
        return view('employees.show')->with('employee', $employee);
    }
    public function create()
    {
        return view('employees.create');
    }
    public function store(Request $request)
    {

        $rules = [
                'name'  => 'required|max:255',
                'job_title' => 'required|max:100',
                'joining_date'   => 'required|date',
                'salary'  => 'required|numeric|min:0',
                'email'  => 'required|email|max:255',
                'mobile_no'  => 'required|string|max:14',
                'address'  => 'required|string'
        ];

        $this->validate($request, $rules);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->job_title = $request->job_title;
        $employee->joining_date = $request->joining_date;
        $employee->salary = $request->salary;
        $employee->email = $request->email;
        $employee->mobile_no = $request->mobile_no;
        $employee->address = $request->address;
        $employee->save();

        return redirect()->route('employees.show', $employee->id );
    }
    public function edit($employeeId)
    {
      $employee = Employee::find($employeeId);

      return view('employees.edit')
            ->with('employee', $employee);
    }
    public function update(Request $request)
    {
        $rules = [
            'name'  => 'required|max:255',
            'job_title' => 'required|max:100',
            'joining_date'   => 'required|date',
            'salary'  => 'required|numeric|min:0',
            'email'  => 'required|email|max:255',
            'mobile_no'  => 'required|string|max:14',
            'address'  => 'required|string'
    ];

    $this->validate($request, $rules);

    $employee = Employee::find($request->id);

    $employee->name = $request->name;
    $employee->job_title = $request->job_title;
    $employee->joining_date = $request->joining_date;
    $employee->salary = $request->salary;
    $employee->email = $request->email;
    $employee->mobile_no = $request->mobile_no;
    $employee->address = $request->address;
    $employee->save();

    return redirect()->route('employees.show', $employee->id );

    }
    public function destroy(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->delete();

        return redirect()->route('employees.index');
    }

}

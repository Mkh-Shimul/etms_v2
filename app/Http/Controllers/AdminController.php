<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as IlluminateValidator;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $data['employees'] = Employee::select('*')->get();
        return view('admin.employee.index', $data);
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone_number' => 'required|min:11',
            'employee_type' => 'required',
            'photo' => 'required',
        ];

        $validator = IlluminateValidator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Employee::create([
            'name' => $request->input('name'),
            'email' => trim($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'employee_type' => $request->input('employee_type'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Employee Created');

        return redirect()->route('admin.index');
    }

    public function show($id)
    {
        $data['employee'] = Employee::select('*')->find($id);
        return view('admin.employee.show', $data);
    }

    public function edit($id)
    {
        $data['employee'] = Employee::select('*')->find($id);
        return view('admin.employee.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone_number' => 'required|min:11',
            'employee_type' => 'required',
            'photo' => 'required',
        ];

        $validator = IlluminateValidator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $emp = Employee::find($id);
        $emp->update([
            'name' => $request->input('name'),
            'email' => trim($request->input('email')),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'employee_type' => $request->input('employee_type'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Employee Information Updated');

        return redirect()->route('admin.index');
    }

    public function delete($id)
    {
        $emp = Employee::find($id);
        $emp->delete();

        session()->flash('type', 'danger');
        session()->flash('status', 'Employee Information Deleted');

        return redirect()->route('admin.index');
    }
}

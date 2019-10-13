<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index()
    {
        $data['staffs'] = Staff::select('*')->get();
        return view('admin.staff.index', $data);
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'staff_type' => 'required',
            'photo' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Staff::create([
            'name' => $request->input('name'),
            'username' => trim($request->input('username')),
            'phone' => $request->input('phone'),
            'password' => bcrypt($request->input('password')),
            'staff_type' => $request->input('staff_type'),
        ]);

        session()->flash('type', 'Success');
        session()->flash('ststus', 'Staff Created Successfully');

        return redirect()->route('staff.index');
    }
}

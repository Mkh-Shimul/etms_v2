<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    public function index()
    {
        $data['staffs'] = Worker::select('*')->get();
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
            'photo' => 'required|image'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photo = $request->file('photo');
        $file_name = Str::random(5) . '.' . $photo->getClientOriginalExtension();

        if ($photo->isValid()) {
            $photo->storeAs('image', $file_name);
        }

        Worker::create([
            'name' => $request->input('name'),
            'username' => trim($request->input('username')),
            'phone' => $request->input('phone'),
            'password' => bcrypt($request->input('password')),
            'staff_type' => $request->input('staff_type'),
            'photo' => $file_name,
        ]);

        session()->flash('type', 'Success');
        session()->flash('status', 'Staff Created Successfully');

        return redirect()->route('staff.index');
    }
}

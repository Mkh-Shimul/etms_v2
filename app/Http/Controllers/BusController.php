<?php

namespace App\Http\Controllers;

use App\MOdels\Bus;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as IlluminateValidator;

class BusController extends Controller
{
    public function index()
    {
        $data['buses'] = Bus::select('*')->get();
        return view('admin.bus.index', $data);
    }

    public function create()
    {
        $data['employees'] = Employee::select('id', 'name')->get();
        return view('admin.bus.create', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'number' => 'required',
            'bus_from' => 'required',
            'bus_to' => 'required',
            'bus_start_time' => 'required',
            'bus_reach_time' => 'required',
            'pickup_location' => 'required',
            'emp_id' => 'required',
        ];

        $validator = IlluminateValidator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Bus::create([
            'number' => trim($request->input('number')),
            'bus_from' => $request->input('bus_from'),
            'bus_to' => $request->input('bus_to'),
            'bus_start_time' => $request->input('bus_start_time'),
            'bus_reach_time' => $request->input('bus_reach_time'),
            'pickup_location' => $request->input('pickup_location'),
            'emp_id' => $request->input('emp_id'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Employee Created');

        return redirect()->route('bus.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\MOdels\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as IlluminateValidator;

class BusController extends Controller
{
    public function index()
    {
        return view('admin.bus.index');
    }

    public function create()
    {
        return view('admin.bus.create');
    }

    public function store(Request $request)
    {
        $time = date('h i A');
        $rules = [
            'number' => 'required',
            'bus_from' => 'required',
            'bus_to' => 'required',
            // 'bus_start_time' => 'required',
            // 'bus_reach_time' => 'required',
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
            'emp_id' => 'default.png',
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Employee Created');

        return redirect()->route('admin.bus.index');
    }
}

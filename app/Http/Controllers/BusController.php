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
        session()->flash('status', 'Bus Information Created');

        return redirect()->route('bus.index');
    }

    public function show($id)
    {
        $data['bus'] = Bus::select('*')->find($id);
        return view('admin.bus.show', $data);
    }

    public function edit($id)
    {
        $data['bus'] = Bus::select('*')->find($id);
        $data['employees'] = Employee::select('id', 'name')->get();
        return view('admin.bus.edit', $data);
    }

    public function update(Request $request, $id)
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

        $bus = Bus::find($id);
        $bus->update([
            'number' => trim($request->input('number')),
            'bus_from' => $request->input('bus_from'),
            'bus_to' => $request->input('bus_to'),
            'bus_start_time' => $request->input('bus_start_time'),
            'bus_reach_time' => $request->input('bus_reach_time'),
            'pickup_location' => $request->input('pickup_location'),
            'emp_id' => $request->input('emp_id'),
        ]);

        session()->flash('type', 'success');
        session()->flash('status', 'Bus Information Updated');

        return redirect()->route('bus.index');
    }

    public function delete($id)
    {
        $bus = Bus::find($id);
        $bus->delete();

        session()->flash('type', 'danger');
        session()->flash('status', 'Bus Information Deleted');

        return redirect()->route('bus.index');
    }
}

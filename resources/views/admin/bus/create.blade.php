@extends('adminLayouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <h2 class="text-center">Create Bus Schedule</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{route('bus.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="number">Bus Number</label>
                    <input type="text" name="number" class="form-control" placeholder="Enter Bus Number">
                </div>
                <div class="form-group">
                    <label for="bus_from">Startig Place</label>
                    <input type="text" name="bus_from" class="form-control" placeholder="Enter Bus's Starting Point">
                </div>
                <div class="form-group">
                    <label for="bus_to">End Place</label>
                    <input type="text" name="bus_to" class="form-control" placeholder="Enter Bus's Ending Point">
                </div>
                <div class="form-group">
                    <label for="starting_time">Starting Time</label>
                    <input type="time" name="bus_start_time" class="form-control">
                </div>
                <div class="form-group">
                    <label for="reaching_time">Reach Time</label>
                    <input type="time" name="bus_reach_time" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pickup_location">Pickup Location</label>
                    <input type="text" name="pickup_location" class="form-control" placeholder="Enter Pickup Location">
                </div>
                <div class="form-group">
                    <label for="holiday_schedule">Holiday Schedule</label>
                    <input type="file" name="holy_schedule" class="form-control">
                </div>
                <div class="form-group">
                    <label for="select driver">Select Driver</label>
                    <select name="emp_id" id="" class="custom-select custom-select-sm">
                        <option selected>Select type</option>
                        @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-block">Create Schedule</button>
            </form>
        </div>

    </div>
</div>

@endsection

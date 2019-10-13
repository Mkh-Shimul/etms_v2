@extends('adminLayouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <h2 class="text-center">Update Bus Schedule</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{route('bus.update', $bus->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="number">Bus Number</label>
                    <input type="text" name="number" class="form-control" placeholder="Enter Bus Number"
                        value="{{$bus->number}}">
                </div>
                <div class="form-group">
                    <label for="bus_from">Startig Place</label>
                    <input type="text" name="bus_from" class="form-control" placeholder="Enter Bus's Starting Point"
                        value="{{$bus->bus_from}}">
                </div>
                <div class="form-group">
                    <label for="bus_to">End Place</label>
                    <input type="text" name="bus_to" class="form-control" placeholder="Enter Bus's Ending Point"
                        value="{{$bus->bus_to}}">
                </div>
                <div class="form-group">
                    <label for="starting_time">Starting Time</label>
                    <input type="time" name="bus_start_time" class="form-control" placeholder="Enter Starting Time"
                        value="{{$bus->starting_time}}">
                </div>
                <div class="form-group">
                    <label for="reaching_time">Reach Time</label>
                    <input type="time" name="bus_reach_time" class="form-control"
                        placeholder="Enter Posible Reaching Time" value="{{$bus->reaching_time}}">
                </div>
                <div class="form-group">
                    <label for="pickup_location">Pickup Location</label>
                    <input type="text" name="pickup_location" class="form-control" placeholder="Enter Pickup Location"
                        value="{{$bus->pickup_location}}">
                </div>
                <div class="form-group">
                    <label for="holiday_schedule">Holiday Schedule</label>
                    <input type="file" name="holy_schedule" class="form-control">
                </div>
                <div class="form-group">
                    <label for="select driver">Select Driver</label>
                    <select name="emp_id" id="" class="custom-select custom-select-sm">
                        @foreach($employees as $employee)
                        <option @if($bus->emp_id === $employee->id) seleced @endif
                            value="{{$employee->id}}">{{$employee->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-block">Update Schedule</button>
            </form>
        </div>

    </div>
</div>

@endsection

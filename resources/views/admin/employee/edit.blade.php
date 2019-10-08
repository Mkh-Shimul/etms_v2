@extends('adminLayouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <h2 class="text-center">Update Employee Details</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{ route('admin.update', $employee->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your fullname"
                        value="{{ $employee->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email"
                        value="{{ $employee->email}}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Enter your phone"
                        value="{{ $employee->email}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="employee_type">Employee Type</label>
                    <select name="employee_type" id="" class="custom-select custom-select-sm">
                        <option value="1" @if($employee->employee_type === 1) selected @endif>Desk Worker</option>
                        <option value="2" @if($employee->employee_type === 2) selected @endif>Driver</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <hr>
                <div class="form-group">
                    <label for="employee_designation">Designation</label>
                    <select name="employee_designation" id="" class="custom-select custom-select-sm">
                        <option selected>Select type</option>
                        <option value="1">Jr. Software Engineer</option>
                        <option value="2">Sr. Software Engineer</option>
                        <option value="3">Poject Manager</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
</div>

@endsection

@extends('adminLayouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <h2 class="text-center">Create Staff</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{route('staff.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                </div>

                <div class="form-group">
                    <label for="phone">Contact Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Contact Number">
                </div>

                <div class="form-group">
                    <label for="staff_type">Staff Type</label>
                    <select name="staff_type" id="" class="custom-select custom-select-sm">
                        <option selected>Select type</option>
                        <option value="1">Driver</option>
                        <option value="2">Cleaner</option>
                        <option value="3">Field Worker</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Create Schedule</button>
            </form>
        </div>

    </div>
</div>

@endsection

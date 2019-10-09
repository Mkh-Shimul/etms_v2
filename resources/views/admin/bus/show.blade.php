@extends('adminLayouts.master')

@section('content')
<div class="container emp-profile">
    <div class="row">
        <div class="col-md-3">
            <div class="profile-img">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                    alt="" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5>
                    {{ $employee->name }}
                </h5>
                <h6>
                    {{$employee->employee_type}}
                </h6>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">About</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.edit', $employee->id) }}" class="btn btn-secondary">Edit Information</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>SKILLS</p>
                <a href="">Web Designer</a><br />
                <a href="">Web Developer</a><br />
                <a href="">WordPress</a><br />
                <a href="">WooCommerce</a><br />
                <a href="">PHP, .Net</a><br />
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $employee->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $employee->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $employee->phone_number }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Profession</label>
                        </div>
                        <div class="col-md-6">
                            <p>Web Developer and Designer</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <form action="{{ route('admin.delete', $employee->id) }}" method="POST"
            onsubmit="return confirm('Data will be lost. Are You Sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Information</button>
        </form>
    </div>
</div>
@endsection

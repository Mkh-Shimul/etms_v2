@extends('adminLayouts.master')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-8">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Staff List</h6>
    </div>
    @if(session()->has('status'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('status') }}
    </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                    <tr>
                        <td>{{$staff->username}}</td>
                        @if($staff->staff_type == 1)
                        <td>Driver</td>
                        @elseif($staff->staff_type == 2)
                        <td>Cleaner</td>
                        @elseif($staff->staff_type == 3)
                        <td>Field Worker</td>
                        @endif
                        <td><img src="{{ asset('uploads/image/'.$staff->photo) }}" alt="staff_image" width="100px"
                                height="100px"></td>
                        <td>
                            <a href="#"><i class="fa fa-edit fa-lg" aria-hidden="true"></i>
                            </a>
                            <a href="#"><i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                            </a>
                            <a href="#"><i class="fa fa-info fa-lg" aria-hidden="true"></i>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

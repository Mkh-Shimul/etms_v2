@extends('adminLayouts.master')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-8">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone_number }}</td>
                        <td>{{$employee->employee_type}}</td>
                        <td>
                            <a href="{{ route('admin.show', $employee->id) }}" class="btn btn-info">Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

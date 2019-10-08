@extends('adminLayouts.master')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-8">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bus List</h6>
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
                        <th>Bus Number</th>
                        <th>Bus Route</th>
                        <th>Driver</th>
                        <th>Schedule</th>
                        <th>Pickup Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection

@extends('adminLayouts.master')

@section('content')
<div class="card">
    <img class="card-img-top img-fluid" src="{{asset('img/bus.jpg')}}" alt="bus_image">
    <div class="card-body d-flex">
        <h3 class="card-title p-2">Bus Number: {{$bus->number}}</h3>
        <hr>
        <h3 class="p-2">Route: {{$bus->bus_from}} - {{$bus->bus_to}}</h3>
        <hr>
        <h3 class="p-2">Bus Driver : {{$bus->worker->name}}</h3>
    </div>

    <div class="d-flex">
        <a href="{{route('bus.edit', $bus->id)}}" class="btn btn-info ml-4">Edit Information</a>
        <hr>
        <form action="{{route('bus.delete', $bus->id)}}" method="post"
            onsubmit="return confirm('Data will be deleted!\nAre you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mr-4">Delete Information</button>
        </form>
    </div>
</div>

@endsection

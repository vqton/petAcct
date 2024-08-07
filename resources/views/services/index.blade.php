@extends('layout.master')

@section('title', 'Services')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h1>Services</h1>
        <a class="btn btn-primary" href="{{ route('services.create') }}">Add Service</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($services as $service)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $service->title }}</td>
                <td>{{ $service->description }}</td>
                <td>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('services.show', $service->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('services.edit', $service->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.master')
@section('content')
    <div class="container">
        <h1 class="mb-4">Categories List</h1>
        @can('categoryCreate')
            <a href="{{ route('categories.create') }}" class="btn btn-outline-success mb-4">
                + Create
            </a>
        @endcan
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-primary text-white" scope="col">ID</th>
                    <th class="bg-primary text-white" scope="col">NAME</th>
                    <th class="bg-primary text-white" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $data)
                    <tr>
                        <th>{{ $data['id'] }}</th>
                        <th>{{ $data['name'] }}</th>
                        <th class="d-flex">
                            @can('categoryEdit')
                                <a href="{{ route('categories.edit', ['id' => $data->id]) }}"
                                    class="btn btn-outline-secondary me-2">Edit</a>
                            @endcan
                            @can('categoryDelete')
                                <form action="{{ route('categories.delete', $data->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            @endcan
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

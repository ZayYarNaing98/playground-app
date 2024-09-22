@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Create Role
            </div>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <input type="text" name="name" class="form-control card-body" placeholder="Enter Role Name" />
                </div>
                @foreach ($permission as $data)
                    <div class="m-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $data->id }}"
                                id="check-box" name="permission[]">
                            <label class="form-check-label" for="check-box">
                                {{ $data->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
                <div class="card-footer">
                    <button class="btn btn-primary me-4" type="submit">+ Create</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection

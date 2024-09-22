@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Edit Role
            </div>
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                {{ method_field('PATCH') }}
                @csrf
                <div class="card-body">
                    <input type="text" name="name" class="form-control card-body" value="{{ $role->name }}" />
                </div>
                @foreach ($permissions as $data)
                    <div class="m-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $data->id }}"
                                id="permission-{{ $data->id }}"
                                {{ $role->permissions->contains($data->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="permission-{{ $data->id }}">
                                {{ $data->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
                <div class="card-footer">
                    <button class="btn btn-primary">Upadte</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Edit Permission
            </div>
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                {{ method_field('PATCH') }}
                @csrf
                <div class="card-body">
                    <input type="text" name="name" class="form-control card-body" value="{{ $permission->name }}" />
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Upadte</button>
                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Manage {{ $user->name }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            <label>Naam</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            <br>
                            <label>email adres</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            <br>
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                        {{ $user->hasAnyRole($role->name) ? 'checked' : '' }}>
                                    <label>{{ $role->name }}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

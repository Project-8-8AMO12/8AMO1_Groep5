@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">create user</div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <label>Naam</label>
                            <input type="text" name="name" class="form-control">
                            <br>
                            <label>email adres</label>
                            <input type="email" name="email" class="form-control">
                            <br>
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <br>
                            @foreach($roles as $role)
                                <div class="form-check">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                                    <label>{{ $role->name }}</label>
                                </div>
                            @endforeach
                            <button type="submit" class="btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

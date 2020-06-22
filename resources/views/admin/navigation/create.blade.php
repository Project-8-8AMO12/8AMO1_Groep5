@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.navigation-menu.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label>Navigatie menu naam</label>
                    <input type="text" name="navigation_table_name" class="form-control">
                </div>
                <div class="col-6">
                    <label>Navigatie menu slug</label>
                    <input type="text" name="navigation_table_slug" class="form-control">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <input type="submit" name="submit" class="form-control">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

@endsection

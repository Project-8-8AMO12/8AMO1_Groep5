@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th width="10%">ID</th>
                <th width="30%">Navigatie Naam</th>
                <th width="20%">Slug</th>
                <th width="40%"><a href="{{ route('admin.navigation-menu.create') }}" class="btn btn-primary">Nieuwe navigatie menu</a>&nbsp;<a href="{{ route('admin.navigation-order.create') }}" class="btn btn-warning">Nieuwe navigatie item</a></th>
            </tr>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->navigation_table_id }}</td>
                    <td>{{ $menu->navigation_table_name }}</td>
                    <td>{{ $menu->navigation_table_slug }}</td>
                    <td>
                        <form action="/admin/navigation-menu/delete/{{ $menu->navigation_table_slug }}" method="post">
                            <a href="{{ route('admin.navigation-menu.edit', $menu->navigation_table_slug) }}" class="btn btn-warning">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('scripts')

@endsection

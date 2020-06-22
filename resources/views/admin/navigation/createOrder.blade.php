@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.navigation-order.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label>Pagina</label>
                    <select class="form-control" name="page_id">
                        @foreach($pages as $page)
                            <option value="{{ $page->page_id }}">{{ $page->page_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label>Navigatie menu</label>
                    <select class="form-control" name="navigation_table_id">
                        @foreach($navigation as $menu)
                            <option value="{{ $menu->navigation_table_id }}">{{ $menu->navigation_table_name }}</option>
                        @endforeach
                    </select>
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

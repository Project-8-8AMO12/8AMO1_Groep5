@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Manage Pages
                        <div>
                            <a href="{{ route('admin.pages.create') }}">
                                <button type="submit" class="btn btn-success btn-sm">Create</button>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Page Name</th>
                                <th scope="col">Page Slug</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($pages as $item)
                                    <tr>
                                        <td>{{ $item->page_id }}</td>
                                        <td>{{ $item->page_name }}</td>
                                        <td>{{ $item->page_slug }}</td>
                                        <td><a href="{{ route('admin.pages.edit', $item->page_id) }}">
                                            <button type="button" class="btn btn-success btn-sm">Edit</button>
                                            </a>
                                            <form action="{{ route('admin.pages.destroy', $item->page_id) }}" method="POST" class="float-left">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $pages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


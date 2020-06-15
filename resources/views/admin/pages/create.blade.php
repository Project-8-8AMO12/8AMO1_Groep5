
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Create Page
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data">
                            @csrf
                            <label>Pagina naam</label>
                            <input type="text" name="page_name" class="form-control">
                            <label>Pagina slug</label>
                            <input type="text" name="page_slug" class="form-control">
                            <label>Template</label>
                            <select name="template" class="form-control">
                                <option value="homepage">Homepage</option>
                                <option value="subpage">Subpage</option>
                            </select>
                            <label>Content</label>
                            <textarea name="body"></textarea>
                            <input type="submit" name="submit" class="form-control"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


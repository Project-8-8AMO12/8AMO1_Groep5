@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($pages as $item)
            <form method="POST" action="{{ route('admin.pages.update', ['page' => $item->page_id]) }}" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <label>Pagina naam</label>
                        <input type="text" name="page_name" class="form-control" value="{{ $item->page_name }}">
                    </div>
                    <div class="col-6">
                        <label>Slug</label>
                        <input type="text" name="page_slug" class="form-control" value="{{ $item->page_slug }}">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <label>Template</label>
                        <select name="template" class="form-control">
                            <option value="homepage" {{ $item->template == 'homepage' ? 'selected' : '' }}>Homepage
                            </option>
                            <option value="subpage" {{ $item->template == 'subpage' ? 'selected' : '' }}>Subpage
                            </option>
                        </select>
                    </div>
                </div>
                <br>
                <textarea name="body">{{ $item->body }}</textarea>
                <br>
                <input type="submit" name="submit" class="form-control"/>

            </form>
        @endforeach
    </div>
@endsection

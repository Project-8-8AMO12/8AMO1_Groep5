@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" }}/send">
            @csrf
            <ul id="sortable">
                @foreach($navigation as $menu)
                    <li class="ui-state-default">
                        {{ $menu->page_name }}
                        <input type="hidden" class="sortable_class" id="{{ $menu->navigation_table_order_id }}" name="{{ $menu->navigation_table_order_id }}" value="{{ $menu->order }}">
                    </li>
                @endforeach
            </ul>
            <input type="submit" name="submit" class="form-control">
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $( "#sortable" ).sortable({
                update: function( event, ui ) {
                    updatemij();
                }
            });
            $( "#sortable" ).disableSelection();
        });

        function updatemij() {
            var i = 1
            $('.sortable_class').each(function(){
                $(this).val(i);
                console.log($(this).attr('id'));
                i++;
            });
        }
    </script>
@endsection


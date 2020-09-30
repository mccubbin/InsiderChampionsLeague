@extends('layouts.app')

@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" defer></script>

    <script>
        window.onload = function() {
            var test = $('#x').text();
        }
    </script>

@endsection


@section('content')

    <div class="offset-4 col-4">

        @if( Session::has('message') )
            <ul class="alert-success">
                <li>{!! session()->get('message') !!}</li>
            </ul>
        @endif


        <h3 class="text-center mb-4">Teams</h3>

        <table class="table table-bordered">
            <tr class="thead">
                <th id="x">Id</th>
                <th>TeamName</th>
            </tr>

            @foreach($teams as $team)
            <tr class="trow">
                <td>{{ $team->id }}</td>
                <td>{{ $team->name }}</td>
            </tr>
            @endforeach
        </table>

    </div>
@endsection


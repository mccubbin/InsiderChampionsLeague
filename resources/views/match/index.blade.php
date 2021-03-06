@extends('layouts.app')

@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" defer></script>

    <script>
        ///////////////////////////////////////////////////////////////////
        // 1. change button links on radio select
        ///////////////////////////////////////////////////////////////////
        function updateButtonUrls() {
            var checkedTaskId = $("input[name='taskRadio']:checked").val();
            $('#editBtn').attr('href', "/tasks/" + checkedTaskId + "/edit");
            $('#viewBtn').attr('href', "/tasks/" + checkedTaskId);
            $('#deleteForm').attr('action', '/tasks/' + checkedTaskId);
        }




    </script>

@endsection


@section('content')

    <div class="offset-2 col-8">

        @if( Session::has('message') )
            <ul class="alert-success">
                <li>{!! session()->get('message') !!}</li>
            </ul>
        @endif


        <h3 class="text-center mb-4">Matches</h3>

        <div class="mb-4">
            <a type="button" class="btn btn-primary" href="/tasks/create">Create</a>
            <a type="button" id="viewBtn" class="btn btn-secondary">View</a>
            <a type="button" id="editBtn" class="btn btn-secondary">Edit</a>
            <form method="POST" action="/tasks/15" id="deleteForm" style="display:inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-secondary">Delete</button>
            </form>
        </div>

        <table id="sortable" class="table table-bordered">
            <tr class="thead">
                <th></th>
                <th>Id</th>
                <th>Week</th>
                <th>Team 1</th>
                <th>Team 2</th>
            </tr>

            @foreach($matches as $match)
            <tr class="trow">
                <td><input type="radio" name="taskRadio" value="{{ $match->id }}" onclick="updateButtonUrls()"></td>
                <td>{{ $match->id }}</td>
                <td>{{ $match->week }}</td>
                <td>{{ $match->team1->name }}</td>
                <td>{{ $match->team2->name }}</td>
            </tr>
            @endforeach
        </table>

    </div>
@endsection


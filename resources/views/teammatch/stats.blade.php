@extends('layouts.app')

@section('scripts')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" defer></script>

@endsection


@section('content')

    <div class="offset-2 col-8">

        @if( Session::has('message') )
            <ul class="alert-success">
                <li>{!! session()->get('message') !!}</li>
            </ul>
        @endif


        <h3 class="text-center mb-4">Stats - Week {{ $week }}</h3>

        <table class="table table-bordered">
            <tr class="thead">
                <th>Week</th>
                <th>Team 1</th>
                <th>Points</th>
                <th>Points</th>
                <th>Team 2</th>
            </tr>

            @foreach($teammatches as $teammatch)
                @if($loop->odd)
                    <tr class="trow">
                        <td>{{ $teammatch->match->week }}</td>
                        <td>{{ $teammatch->team->name }}</td>
                        <td>{{ $teammatch->points }}</td>

                    @php
                        $team1 = $teammatch->team->name;
                        $team1pts = $teammatch->points;
                        $teams[$team1]['name'] = $team1;
                        $teams[$team1]['p'] = isset($teams[$team1]['p']) ? $teams[$team1]['p'] + $teammatch->points : $teammatch->points;
                    @endphp
                @endif

                @if($loop->even)
                        <td>{{ $teammatch->points }}</td>
                        <td>{{ $teammatch->team->name }}</td>
                    </tr>
                    @php
                        $team2 = $teammatch->team->name;
                        $team2pts = $teammatch->points;

                        $teams[$team2]['name'] = $team2;
                        $teams[$team2]['p'] = isset($teams[$team2]['p']) ? $teams[$team2]['p'] + $teammatch->points : $teammatch->points;

                        if ($team1pts > $team2pts) {
                            $teams[$team1]['w'] = isset($teams[$team1]['w']) ? $teams[$team1]['w'] + 1 : 1;
                            $teams[$team2]['l'] = isset($teams[$team2]['l']) ? $teams[$team2]['l'] + 1 : 1;
                        }
                        if ($team2pts > $team1pts) {
                            $teams[$team2]['w'] = isset($teams[$team2]['w']) ? $teams[$team2]['w'] + 1 : 1;
                            $teams[$team1]['l'] = isset($teams[$team1]['l']) ? $teams[$team1]['l'] + 1 : 1;
                        }


                    @endphp
                @endif

            @endforeach

            @php
            //dd($teams);
            @endphp

        </table>

        <br><br>


        <table class="table table-bordered offset-1 col-10">
            <tr class="thead">
                <th>Team</th>
                <th>Total Pts</th>
                <th>Wins</th>
                <th>Losses</th>
            </tr>

            @foreach($teams as $team)
                <tr class="trow">
                    <td>{{ $team['name'] }}</td>
                    <td>
                        @isset($team['p'])
                            {{$team['p']}}
                        @else
                            0
                        @endisset
                    </td>
                    <td>
                        @isset($team['w'])
                            {{$team['w']}}
                        @else
                            0
                        @endisset
                    </td>
                    <td>
                        @isset($team['l'])
                            {{$team['l']}}
                        @else
                            0
                        @endisset
                    </td>
                </tr>

            @endforeach

        </table>


    </div>
@endsection


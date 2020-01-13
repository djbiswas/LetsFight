@extends('layouts.admin')
@section('title', 'Fight List')

@section('content')

    {{-- FightCategory start--}}

    <div class="row justify-content-between mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col text-uppercase text-left">

            <h3 class="text-center">Fight Management</h3>
        </div>
        <div class="col text-right">
            <a class="btn btn-success" href="{{route('fights.create')}}"> <i class="fas fa-user-plus"></i> New
                Fight</a>
            <a class="btn btn-dark" href="{{ URL::previous() }}">Go Back</a>
        </div>
    </div>
    <div class="row justify-content-center mb-4 mx-5 pb-3 border-bottom fightCategory">
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Fight Name</th>
                <th scope="col">Fight Category</th>
                <th scope="col">Player 01</th>
                <th scope="col">Player 02</th>
                <th scope="col" width="210px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $fightWithPlayers as $key => $fight)
                <tr>
                    <td class="align-middle"> {{++$i}}</td>
                    <td class="align-middle">{{$fight->fight_name}}</td>
                    <td class="align-middle">{{$fight->fightCategory->fight_group_name}}</td>
                    <td class="align-middle">{{$fight->players[0]->name}}</td>
                    <td class="align-middle">{{$fight->players[1]->name}}</td>
                    <td class="align-middle">
                        @include('shared._action',[ 'target' => 'fights', 'param' => 'fight' ])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-12 col-md-offset-3">
            {{ $fightWithPlayers->links() }}
        </div>
    </div>
    {{-- FightCategory close --}}

@stop

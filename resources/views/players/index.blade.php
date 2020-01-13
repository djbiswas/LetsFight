@extends('layouts.admin')
@section('title', 'category List')

@section('pagestyle')
    <style>
        .show {
            display: none;
        }
    </style>
@endsection

@section('content')

    {{-- FightCategory start--}}

    <div class="row justify-content-between mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col text-uppercase text-left">

            <h3>Player Management</h3>
        </div>
        <div class="col text-right">
            <a class="btn btn-success" href="{{route('players.create')}}"> <i class="fas fa-user-plus"></i> New
                Player</a>
            <a class="btn btn-dark" href="{{ URL::previous() }}">Go Back</a>
        </div>
    </div>
    <div class="row justify-content-center mb-4 mx-5 pb-3 border-bottom fightCategory">
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Height</th>
                <th scope="col">Weight</th>
                <th scope="col">Age</th>
                <th scope="col">Weapon</th>
                <th scope="col" width="210px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $players as $key => $player)

                <tr>
                    <td class="align-middle"> {{++$i}}</td>
                    <td class="align-middle">{{$player->name}}</td>
                    <td class="align-middle"><img src="{{asset($player->image)}}" alt="image" class="img-thumbnail img-thumbnail-small img-fluid"></td>
{{--                    <td class="align-middle"><img src="{{asset($player->image)}}" alt="image" class="img-thumbnail img-thumbnail-small img-fluid"></td>--}}
                    <td class="align-middle">{{$player->Height}}</td>
                    <td class="align-middle">{{$player->weight}}</td>
                    <td class="align-middle">{{$player->age}}</td>
                    <td class="align-middle">{{$player->weapon->name}}</td>
                    <td class="align-middle">
                        @include('shared._action',[ 'target' => 'players', 'param' => 'player' ])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
        <div class="col-md-12 col-md-offset-4">
            {{ $players->links() }}
        </div>
    </div>

    {{-- FightCategory close --}}




@stop

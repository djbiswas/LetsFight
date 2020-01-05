@extends('layouts.admin')
@section('title', 'category List')

@section('content')

    {{-- FightCategory start--}}

    <div class="row justify-content-between mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col text-uppercase text-left">

            <h3>Weapon Management</h3>
        </div>
        <div class="col text-right">
            <a class="btn btn-success" href="{{route('weapons.create')}}"> <i class="fas fa-user-plus"></i> New
                Weapon</a>
            <a class="btn btn-dark" href="{{ URL::previous() }}">Go Back</a>
        </div>
    </div>
    <div class="row justify-content-center mb-4 mx-5 pb-3 border-bottom fightCategory">
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col" width="210px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $weapons as $key => $weapon)

                <tr>
                    <td class="align-middle"> {{++$i}}</td>
                    <td class="align-middle">{{$weapon->name}}</td>
                    <td class="align-middle">{{$weapon->weapon_description}}</td>
                    <td class="align-middle">
                        @include('shared._action',[ 'target' => 'weapons', 'param' => 'weapon' ])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-6 col-md-offset-3">
            {{ $weapons->links() }}
        </div>
    </div>

    {{-- FightCategory close --}}




@stop

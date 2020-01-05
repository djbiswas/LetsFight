@extends('layouts.admin')
@section('title', 'category List')

@section('content')

    <div class="row justify-content-between mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col text-uppercase text-left">

            <h3>Player Management</h3>
        </div>
        <div class="col text-right">
            <a class="btn btn-primary" href="{{route('players.index')}}"> <i class="fas fa-user-plus"></i> Back To List</a>
            {{--  <a class="btn btn-dark" href="{{ URL::previous() }}">Go Back</a>--}}
        </div>
    </div>

    <div class="row justify-content-between mb-4 mx-5 pb-3 fightCategory">
        <div class="col">
            {!! Form::open(['route' => 'players.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
            @include('players._playerForm')
        </div>
    </div>

@endsection

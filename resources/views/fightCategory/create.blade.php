@extends('layouts.admin')
@section('title', 'category List')

@section('content')

    <div class="row justify-content-between mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col text-uppercase text-left">

            <h3>FightCategory Management</h3>
        </div>
        <div class="col text-right">
            <a class="btn btn-primary" href="{{route('fightCategory.list')}}"> <i class="fas fa-user-plus"></i> Back To List</a>
        {{--  <a class="btn btn-dark" href="{{ URL::previous() }}">Go Back</a>--}}
        </div>
    </div>

    <div class="row justify-content-between mb-4 mx-5 pb-3 fightCategory">
        <div class="col">
            {!! Form::open(['route' => 'fightCategory.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
            @include('fightCategory._categoryForm')
        </div>

    </div>

@endsection

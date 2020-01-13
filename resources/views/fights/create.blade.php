@extends('layouts.admin')
@section('title', 'Fight')

@section('content')
    <div class="row justify-content-between mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col text-uppercase text-left">

            <h3>Fight Management</h3>
        </div>
        <div class="col text-right">
{{--            <a class="btn btn-primary" href="{{route('players.index')}}"> <i class="fas fa-user-plus"></i> Back To List</a>--}}
              <a class="btn btn-dark" href="{{ URL::previous() }}">Go Back</a>
        </div>
    </div>
    <div class="row justify-content-between mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col">
            {!!  Form::open(['route' => 'fights.store', 'enctype' => 'multipart/form-data' ])  !!}
            {{csrf_field()}}

            @include('fights._fightForm')

            {!! Form::close() !!}
        </div>

    </div>




@stop

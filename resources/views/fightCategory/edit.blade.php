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
            {{ Form::model($fightCategory, ['route' => ['fightCategory.update', $fightCategory->id], 'method' => 'put','enctype' => 'multipart/form-data']) }}
            <div class="input-group mb-3">
                {{Form::text('fight_group_name', null, array('class' => 'form-control', 'placeholder' => 'Fight Group Name', 'required'  ))}}
            </div>

            {{Form::label('category_image', 'Fight Category Image')}}
            <div class="input-group mb-3">
                {{Form::file('category_image', array('class' => 'form-control'  ))}}
            </div>

            {{Form::label('group_note', 'Group Note')}}
            <div class="input-group mb-3">
                {{Form::textarea('group_note', null, array('class' => 'form-control', 'placeholder' => 'Group Note. . . .'  ))}}
            </div>

            <hr>
            <div class="text-right">

                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            </div>
            {{ Form::close() }}
        </div>

    </div>

@endsection

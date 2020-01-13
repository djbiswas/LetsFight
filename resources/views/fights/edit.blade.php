@extends('layouts.admin')
@section('title', 'Fight')

@section('content')
    <div class="row justify-content-between mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col text-uppercase text-left">
            <h3>Fight Management</h3>
        </div>
        <div class="col text-right">
            <a class="btn btn-primary" href="{{route('players.index')}}"> <i class="fas fa-user-plus"></i> Back To List</a>
            {{--  <a class="btn btn-dark" href="{{ URL::previous() }}">Go Back</a>--}}
        </div>
    </div>
    <div class="row justify-content-between mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col">
            {!! Form::model($fight,['method' =>'PATCH', 'route' => ['fights.update', $fight->id], 'enctype' => 'multipart/form-data'])  !!}
            {{csrf_field()}}
            <!-- Fight name Input Form -->
                <div class="form-group  ">
                    {{Form::label('fight_name','Fight name:') }}

                    {{Form::text('fight_name', null, ['class' => 'form-control', 'placeholder' => 'Fight name', 'required']) }}

                    @error('fight_name')
                    <span>{{ $message }}</span>
                    @enderror

                </div>

                <div class="row">
                    <div class="col">
                        <!-- Player_1 Select Field -->
                        <div class="form-group  ">
                            {{Form::label('player_1','Player 1:') }}

                            {{Form::select('player_1', $players, null, ['class' => 'form-control select2op','id' => 'player_1', 'placeholder' => $fightPlayers->players[0]->name ]) }}
                            @if ($errors->has('player_1'))
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('player_1') }}</strong>
                    </span>
                            @endif

                        </div>

                    </div>
                    <div class="col-1 text-center" style="margin-top: 2%">VS</div>
                    <div class="col">
                        <!-- Player_2 Select Field -->
                        <div class="form-group  ">
                            {{Form::label('player_2','Player 2:') }}

                            {{Form::select('player_2', $players, null, ['class' => 'form-control select2op','id' => 'player_2', 'placeholder' => $fightPlayers->players[1]->name]) }}
                            @if ($errors->has('player_2'))
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('player_2') }}</strong>
                    </span>
                            @endif

                        </div>

                    </div>
                </div>

                <!-- Fight_category_id Select Field -->
                <div class="form-group  ">
                    {{Form::label('fight_category_id','Fight Category:') }}

                    {{Form::select('fight_category_id', $fight_categories, null, ['class' => 'form-control select2op','id' => 'fight_category_id', 'placeholder' => 'Pick a Fight Category...', 'required']) }}
                    @if ($errors->has('fight_category_id'))
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('fight_category_id') }}</strong>
            </span>
                    @endif

                </div>

                <!-- Fight_banner Input Form -->
                <div class="form-group">
                    <img src="{{asset($fight->fight_banner)}}" alt="" width="100">
                    {{Form::label('fight_banner','New Fight Banner:') }}

                    {{Form::file('fight_banner', null) }}
                    <p class="help-block"></p>
                </div>

                <!-- Submit Button Form -->
                <div class="text-right">
                    {{Form::submit('Submit', ['class' => 'btn btn-primary']) }}

                </div>


                {!! Form::close() !!}

        </div>

    </div>




@stop

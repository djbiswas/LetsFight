@extends('layouts.app')
@section('meta')
    <title>{{ $settings->title }}</title>
    <meta name="description" content="{{ $settings->description }}">
    <meta name="keywords" content="{{ $settings->keywords }}">
@endsection

@section('content')
    <div class="container">
        <div class="mt-2">@include('flash::message')</div>

        <div class="row justify-content-center fight--category mt-5">
            @foreach($fightCategories as $fightCategory)

{{--                    <a class="col-md-4 col-sm-6 col-xs-12 mb-4" href="{{route('fightCategory.show', $fightCategory)}}">--}}
{{--                        <div class="card py-5"--}}
{{--                             style="background-image: url({{asset($fightCategory->category_image)}});">--}}
{{--                            <div class="card-body">--}}
{{--                                <h3 class="card-title font-weight-bold text-center text-uppercase text-white">{{$fightCategory->fight_group_name}}</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}

                <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
                    <a href="{{route('fightCategory.show', $fightCategory)}}">
                        <div class="card">
                            <img class="card-img-top card-i" src="{{asset($fightCategory->category_image)}}" alt="Card image cap">
                            <div class="card-img-overlay text-white">
                                <h5 class="card-title">{{$fightCategory->fight_group_name}}</h5>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach
        </div>
        <div class="row justify-content-center fight--category">
            {{$settings->ads1}}
        </div>


        <div>
            <!-- contact us -->
            <div class=" pb-5">
                <div class="row justify-content-center fight--category mt-5">
{{--                    <div class="col-12">--}}
{{--                        @include('flash::message')--}}
{{--                    </div>--}}

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3" >
                        <div class="card text-center">
                            <div class="card-header">
                                <h3>Suggest A Fight</h3>
                            </div>
                            {!! Form::open(['route' => 'suggestions.store', 'method' => 'post' ]) !!}
                            {{Form::text('type', 'fight', array('class' => 'form-control ml-1', 'required', 'hidden'  ))}}
                                <div class="card-body">
                                    <div class="mb-2 sug-fight">
                                        <div class="input-group mb-3">
                                            {{Form::text('player_one', null, array('class' => 'form-control ml-1', 'placeholder' => 'Player One', 'required'  ))}}
                                        </div>
                                        <h4 class="card-title">VS</h4>
                                        <div class="input-group mb-3">
                                            {{Form::text('player_two', null, array('class' => 'form-control ml-1', 'placeholder' => 'Player Two', 'required'  ))}}
                                        </div>
                                    </div>
                                    <h4>Description</h4>
                                    <div class="input-group mb-3">
                                        {{Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description', 'required'  ))}}
                                    </div>
                                    {{Form::submit('Submit', ['class' => 'btn btn-secondary rounded-sm mt-2'])}}
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                    <!-- make a sugestion -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" >
                        {!! Form::open(['route' => 'suggestions.store', 'method' => 'post' ]) !!}
                        {{Form::text('type', 'new', array('class' => 'form-control ml-1', 'required', 'hidden'  ))}}
                        <div class="card text-center mb-4">
                            <div class="card-header">
                                <h3>Make a Suggestion</h3>
                            </div>

                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        {{Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Your Email', 'required'  ))}}
                                    </div>
                                    <h4>Your Suggestion</h4>
                                    <div class="input-group mb-3">
                                        {{Form::textarea('problem', null, array('class' => 'form-control', 'placeholder' => 'Your Suggestion', 'required'  ))}}
                                    </div>
                                    {{Form::submit('Submit', ['class' => 'btn btn-secondary rounded-sm mt-2'])}}

                                </div>

                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card text-center mb-3">

                        <div class="card-header">
                            <h3>Our Social Medias</h3>
                        </div>
                        <div class="card-body d-flex justify-content-around">
                            <a href="{{$settings->facebook}}"><i class="fab fa-facebook" style="font-size: 32px;"></i></a>
                            <a href="{{$settings->twitter}}"><i class="fab fa-twitter" style="font-size: 32px;"></i></a>
                            <a href="{{$settings->instagram}}"><i class="fab fa-instagram" style="font-size: 32px;"></i></a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

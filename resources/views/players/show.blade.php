@extends('layouts.app')
@section('meta')
    <title>{{ $settings->title }}</title>
    <meta name="description" content="{{ $settings->description }}">
    <meta name="keywords" content="{{ $settings->keywords }}">
@endsection
@section('end_head')
    {!! $settings->meta_verify !!}

@endsection
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col text-center">
                <h1 class="py-5 text-white"> {{$players->name}} </h1>
            </div>
        </div>

        <div class="row justify-content-center fight--category mt-5">
            <div class="row">
            @foreach($players->fights as $fight)
                <!-- content for mobile -->
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-5">
                        <a href="{{route('fights.show', [str_slug($players->fightCategory->fight_group_name, "-"), $fight->id])}}">
                            <div class="card">
                                {{--                            <img class="vs" src="/images/vs.png" alt="">--}}

                                <div class="player d-flex justify-content-around" style="width: 100%;">
                                    <h5 class="vs">VS</h5>
                                    <div class="x_player" style="width: 50%;">
                                        <img class="card-img-top " src="/{{ $fight->playerImage_1}}" alt="">
                                    </div>
                                    <div class="x_player" style="width: 50%;">
                                        <img class="card-img-top "  src="/{{ $fight->playerImage_2}}" alt="">
                                    </div>
                                </div>
                                <div class="card-body text-center d-flex justify-content-around">
                                    <h5>{{$fight->fight_name}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    {!! $settings->ads2 !!}
    </div>
@endsection

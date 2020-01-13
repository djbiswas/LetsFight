@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
             <div class="col text-center">
             <h1 class="py-5 text-white"> {{$fightsCat->fight_group_name}} </h1>
             </div>

        </div>


        <div class="row justify-content-center fight--category mt-5">
            @foreach($fightsCat->fights as $fight)

{{--                <a class="col-md-4 col-sm-6 col-xs-12 mb-4" href="{{route('fights.show', $fight->id)}}">--}}
{{--                    <div class="card py-5">--}}
{{--                        <div class="card-body text-center">--}}
{{--                            <h3 class="card-title font-weight-bold  text-uppercase">--}}
{{--                                {{$fight->fight_name}}--}}
{{--                            </h3>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}


                <div class="col-sm-12 col-md-6 col-lg-4 mb-5">
                    <a href="{{route('fights.show', $fight->id)}}">
                        <div class="card">
                            <img class="vs" src="/images/vs.png" alt="VS">
                            <div class="player d-flex justify-content-around">
                                <div class="x_player">
                                    <img class="card-img-top " src="/{{ $fight->fight_banner  ? $fight->fight_banner : 'images/category.jpg'}}" alt="">
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
@endsection

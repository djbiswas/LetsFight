@extends('layouts.app')

@section('content')
    <div class="container">
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
                            <img class="card-img-top" src="{{asset($fightCategory->category_image)}}" alt="Card image cap">
                            <div class="card-img-overlay text-white">
                                <h5 class="card-title">{{$fightCategory->fight_group_name}}</h5>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach
        </div>
    </div>
@endsection

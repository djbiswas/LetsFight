@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center fight--category">
            @foreach($fightCategories as $fightCategory)

                    <a class="col-md-4 col-sm-6 col-xs-12 mb-4" href="{{route('fightCategory.show', $fightCategory)}}">
                        <div class="card py-5"
                             style="background-image: url({{asset('/storage/images/'.$fightCategory->category_image)}});">
                            <div class="card-body">
                                <h3 class="card-title font-weight-bold text-center text-uppercase text-white">{{$fightCategory->fight_group_name}}</h3>
                            </div>
                        </div>
                    </a>

            @endforeach
        </div>
    </div>
@endsection

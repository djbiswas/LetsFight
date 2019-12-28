@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
             <div class="col text-center">
             <h1 class="py-5">    {{ $fightsCat->fight_group_name }} </h1>
             </div>

        </div>

        <div class="row justify-content-center fight--category">
            @foreach($fightsCat->fights as $fight)

                <a class="col-md-4 col-sm-6 col-xs-12 mb-4" href="{{route('fights.show', $fight->id)}}">
                    <div class="card py-5">
                        <div class="card-body text-center">
                            <h3 class="card-title font-weight-bold  text-uppercase">
                                {{$fight->fight_name}}
                            </h3>

                        </div>
                    </div>
                </a>



            @endforeach
        </div>
    </div>
@endsection

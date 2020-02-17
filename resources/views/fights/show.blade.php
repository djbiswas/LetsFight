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
    {{--Desktop--}}
    <section>
        <div class="d-mother desk-responsive">
            <div class="container d-md-block d-lg-block d-sm-none">
                <div class="row text-center mt-5 mb-2 ">

                    <!-- player one for desktop-->
                    <div class="col-lg-4 col-md-4 p1-col mb-2 ">
                        <div class="btn-lg btn-primary btn-block mb-2 d-none">Player 1 </div>
                        <div class="card">
                             <a href="/players/{{$fightWithPlayers->players[0]->id}}">
                                    <img class="card-img-top card-i" src="/{{ $fightWithPlayers->players[0]->image}}" alt="Card image cap">

                                <div class="card-body">
                                    <p class="h4 text-center ">{{ $fightWithPlayers->players[0]->name }}</p>
                                </div>
                            </a>
                        </div>
                        @if( !is_null($cookie))
                            <h2 class="text-center view-vote text-white mt-2 font-weight-bolder"><span class="num-count">{{ ($vote_1)?: 0 }}</span> % </h2>
                        @else
                            <form method="post" action="{{ route('fights.addVote', [$fightWithPlayers->id, $fightWithPlayers->players[0]->id] )
                        }}">
                                @csrf

                                <div class="form-group text-center">
                                    <button class="btn btn-secondary btn-lg btn-block mt-2  " type="submit">VOTE +</button>
                                </div>

                            </form>
                        @endif
                    </div>

                    <!-- original tape of tail -->
                    <div class="col-lg-4 col-md-4 tape-of-tail mb-2">
                        <p class="display-4 text-white vs_text text-center ">VS</p>
                        <div class="card">
                            <div class="btn-block btn-secondary"><h5>Tale of Tape</h5></div>
                            <div class="text-center">
                                {{-- Nationality --}}
                                @if ($fightWithPlayers->players[0]->from != '' || $fightWithPlayers->players[1]->from != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->from}}</div>
                                        <div class="td">Nationality</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->from}}</div>
                                </div>
                                @endif

                                {{-- Height --}}
                                @if ($fightWithPlayers->players[0]->Height != '' || $fightWithPlayers->players[1]->Height != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->Height}}</div>
                                        <div class="td">Height</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->Height}}</div>
                                </div>
                                @endif

                                {{-- Weight --}}
                                @if ($fightWithPlayers->players[0]->weight != '' || $fightWithPlayers->players[1]->weight != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->weight}}</div>
                                        <div class="td">Weight</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->weight}}</div>
                                </div>
                                @endif

                                {{-- Age --}}
                                @if ($fightWithPlayers->players[0]->age != '' || $fightWithPlayers->players[1]->age != '')

                                <div class="tc d-flex justify-content-around align-items-center">

                                    <div class="td">{{$fightWithPlayers->players[0]->age}}</div>
                                        <div class="td">Age</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->age}}</div>
                                </div>
                                @endif

                                {{-- Size --}}
                                @if ($fightWithPlayers->players[0]->size != '' || $fightWithPlayers->players[1]->size != '')

                                <div class="tc d-flex justify-content-around align-items-center">

                                    <div class="td">{{$fightWithPlayers->players[0]->size}}</div>
                                        <div class="td">Size</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->size}}</div>
                                </div>
                                @endif

                                {{-- Continent --}}
                                @if ($fightWithPlayers->players[0]->continent != '' || $fightWithPlayers->players[1]->continent != '')

                                <div class="tc d-flex justify-content-around align-items-center">

                                    <div class="td">{{$fightWithPlayers->players[0]->continent}}</div>
                                        <div class="td">Continent</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->continent}}</div>
                                </div>
                                @endif

                                {{-- Area --}}
                                @if ($fightWithPlayers->players[0]->area != '' || $fightWithPlayers->players[1]->area != '')

                                <div class="tc d-flex justify-content-around align-items-center">

                                    <div class="td">{{$fightWithPlayers->players[0]->area}}</div>
                                        <div class="td">Area</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->area}}</div>
                                </div>
                                @endif

                                {{-- Speed --}}
                                @if ($fightWithPlayers->players[0]->speed != '' || $fightWithPlayers->players[1]->area != '')

                                <div class="tc d-flex justify-content-around align-items-center">

                                    <div class="td">{{$fightWithPlayers->players[0]->speed}}</div>
                                        <div class="td">Speed</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->speed}}</div>
                                </div>
                                @endif

                                {{-- Attacks --}}
                                @if ($fightWithPlayers->players[0]->attacks != '' || $fightWithPlayers->players[1]->attacks != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->attacks}}</div>
                                        <div class="td">Attacks</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->attacks}}</div>
                                </div>
                                @endif

                                {{-- Years --}}
                                @if ($fightWithPlayers->players[0]->years != '' || $fightWithPlayers->players[1]->years != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->years}}</div>
                                        <div class="td">Years</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->years}}</div>
                                </div>
                                @endif

                                {{-- Role --}}
                                @if ($fightWithPlayers->players[0]->role != '' || $fightWithPlayers->players[1]->role != '')
                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->role}}</div>
                                        <div class="td">Role</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->role}}</div>
                                </div>
                                @endif

                                {{-- Sport --}}
                                @if ($fightWithPlayers->players[0]->sport != '' || $fightWithPlayers->players[1]->sport != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->sport}}</div>
                                        <div class="td">Sport</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->sport}}</div>
                                </div>
                                @endif

                                {{-- Record --}}
                                @if ($fightWithPlayers->players[0]->record != '' || $fightWithPlayers->players[1]->record != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->record}}</div>
                                        <div class="td">Record</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->record}}</div>
                                </div>
                                @endif

                                {{-- Shows --}}
                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->shows}}</div>
                                    @if ($fightWithPlayers->players[0]->shows != '' || $fightWithPlayers->players[1]->shows != '')
                                        <div class="td">Shows</div>
                                    @endif
                                    <div class="td">{{$fightWithPlayers->players[1]->shows}}</div>



                                </div>
                                {{-- Game --}}
                                @if ($fightWithPlayers->players[0]->game != '' || $fightWithPlayers->players[1]->game != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->game}}</div>
                                        <div class="td">Game</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->game}}</div>
                                </div>
                                @endif

                                {{-- Debut --}}
                                @if ($fightWithPlayers->players[0]->debut != '' || $fightWithPlayers->players[1]->debut != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->debut}}</div>
                                        <div class="td">Debut</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->debut}}</div>
                                </div>
                                @endif

                                {{-- Type --}}
                                @if ($fightWithPlayers->players[0]->type != '' || $fightWithPlayers->players[1]->type != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->type}}</div>
                                        <div class="td">Type</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->type}}</div>
                                </div>
                                @endif

                                {{-- Identity --}}
                                @if ($fightWithPlayers->players[0]->identity != '' || $fightWithPlayers->players[1]->identity != '')

                                <div class="tc d-flex justify-content-around align-items-center">
                                    <div class="td">{{$fightWithPlayers->players[0]->identity}}</div>
                                        <div class="td">Identity</div>
                                    <div class="td">{{$fightWithPlayers->players[1]->identity}}</div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>


                    <!-- player two for desktop-->
                    <div class="col-lg-4 col-md-4 p2-col mb-2">
                        <div class="btn-lg btn-primary btn-block mb-2 d-none">Player 2 </div>
                        <div class="card" >
                            <a href="/players/{{$fightWithPlayers->players[1]->id}}">
                                <img class="card-img-top card-i" src="/{{ $fightWithPlayers->players[1]->image}}" alt="Card image cap">
                                <div class="card-body">
                                    <p class="h4 text-center">{{ $fightWithPlayers->players[1]->name }}</p>
                                </div>
                            </a>
                        </div>

                        @if( !is_null($cookie))
                            <h2 class="text-center view-vote text-white mt-2 font-weight-bolder"><span class="num-count">{{ ($vote_2  )?: 0 }}</span> % </h2>

                        @else
                            <form method="post" action="{{ route('fights.addVote', [$fightWithPlayers->id, $fightWithPlayers->players[1]->id] )
                        }}">
                                @csrf

                                <div class="form-group text-center">
                                    <button class="btn btn-secondary btn-lg btn-block mt-2  " type="submit">VOTE +</button>
                                </div>
                            </form>
                        @endif

                    </div>

                </div>
            </div>
            <!-- newly added---------------------------------------------------------------------------------->

            <!-- next prev button -->
            <div class="d-md-none d-lg-block d-xl-block">
                <div class="np-buttons custom-pagi w-100 ">
                    @if($prv_fight != 0)
                        <a class="prev-f" href="/{{$fightCatName}}/fights/{{$prv_fight}}">
                            <span class="n-icon bg-primary p-2"><i class="fas fa-chevron-left"></i></span>
                            <span class="prev-f-text pr-2">Previous</br>Fight</span>
                        </a>
                    @endif
                    @if($next_fight != 0)
                        <a class="next-f" href="/{{$fightCatName}}/fights/{{$next_fight}}">
                            <span class="next-f-text pl-3">Next</br>Fight</span>
                            <span class="n-icon bg-primary p-2"><i class="fas fa-chevron-right"></i></span>
                        </a>
                    @endif
                </div>
            </div>

        {{-- now it's off--}}
        <!-- ----------------------------------------------------------------------------------------- -->
        </div>
    </section>

    {{--Mobile--}}
    <section>
        <div class="container mt-2">
            <div class="row d-lg-none d-md-none">
                <!-- content for mobile -->
                <div class="col-sm-12 fight-phone">
                    <div class="card">
                        {{--                        <img class="vs" src="/images/vs.png" alt="">--}}

                        <div class="player d-flex justify-content-around" style="width: 100%; max-height: 250px;">
                            <h5 class="vs">VS</h5>
                            <div class="x_player" style="width: 50%;">
                                <a href="/players/{{$fightWithPlayers->players[0]->id}}">
                                 <img class="card-img-top " src="/{{ $fightWithPlayers->players[0]->image}}" alt="">
                                </a>
                            </div>
                            <div class="x_player" style="width: 50%;">
                                <a href="/players/{{$fightWithPlayers->players[1]->id}}">
                                    <img class="card-img-top "  src="/{{ $fightWithPlayers->players[1]->image}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row d-lg-none d-sm-block d-md-block">
                <div class="col-sm-12 np-buttons w-100 mt-2 " style="position: relative">
                    <div class="custom-pagi-m">
                        @if($prv_fight != 0)
                            <a class="prev-f" href="/{{$fightCatName}}/fights/{{$prv_fight}}">
                                <span class="n-icon bg-primary p-2"><i class="fas fa-chevron-left"></i></span>
                                <span class="prev-f-text pr-2">Previous</br>Fight</span>
                            </a>
                        @endif
                        @if($next_fight != 0)
                            <a class="next-f" href="/{{$fightCatName}}/fights/{{$next_fight}}">
                                <span class="next-f-text pl-3">Next</br>Fight</span>
                                <span class="n-icon bg-primary p-2"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row d-lg-none d-sm-block d-md-none">
                <!-- mobile tape of tail -->
                <div class="col-sm-12 mb-2 mt-2">
                    <div class="card">
                        <div class="btn btn-block btn-secondary d-flex justify-content-around"><h5>{{ $fightWithPlayers->players[0]->name}}</h5><h5>Tale of Tape</h5><h5>{{ $fightWithPlayers->players[1]->name}}</h5></div>



                        {{-- ------------------------------------------------------------------------------ --}}
                        <div class="text-center">
                            {{-- Nationality --}}
                            @if ($fightWithPlayers->players[0]->from != '' || $fightWithPlayers->players[1]->from != '')

                            <div class="tc d-flex justify-content-around align-items-center">
                                <div class="td">{{$fightWithPlayers->players[0]->from}}</div>
                                    <div class="td">Nationality</div>
                                <div class="td">{{$fightWithPlayers->players[1]->from}}</div>
                            </div>
                            @endif

                            {{-- Height --}}
                            @if ($fightWithPlayers->players[0]->Height != '' || $fightWithPlayers->players[1]->Height != '')

                            <div class="tc d-flex justify-content-around align-items-center">
                                <div class="td">{{$fightWithPlayers->players[0]->Height}}</div>
                                    <div class="td">Height</div>
                                <div class="td">{{$fightWithPlayers->players[1]->Height}}</div>



                            </div>
                            @endif

                            {{-- Weight --}}
                            @if ($fightWithPlayers->players[0]->weight != '' || $fightWithPlayers->players[1]->weight != '')

                            <div class="tc d-flex justify-content-around align-items-center">
                                <div class="td">{{$fightWithPlayers->players[0]->weight}}</div>
                                    <div class="td">Weight</div>
                                <div class="td">{{$fightWithPlayers->players[1]->weight}}</div>



                            </div>
                            @endif

                            {{-- Age --}}
                            @if ($fightWithPlayers->players[0]->age != '' || $fightWithPlayers->players[1]->age != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->age}}</div>
                                    <div class="td">Age</div>
                                <div class="td">{{$fightWithPlayers->players[1]->age}}</div>



                            </div>
                            @endif

                            {{-- Size --}}
                            @if ($fightWithPlayers->players[0]->size != '' || $fightWithPlayers->players[1]->size != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->size}}</div>
                                    <div class="td">Size</div>
                                <div class="td">{{$fightWithPlayers->players[1]->size}}</div>



                            </div>
                            @endif

                            {{-- Continent --}}
                            @if ($fightWithPlayers->players[0]->continent != '' || $fightWithPlayers->players[1]->continent != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->continent}}</div>
                                    <div class="td">Continent</div>
                                <div class="td">{{$fightWithPlayers->players[1]->continent}}</div>



                            </div>
                            @endif

                            {{-- Area --}}
                            @if ($fightWithPlayers->players[0]->area != '' || $fightWithPlayers->players[1]->area != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->area}}</div>
                                    <div class="td">Area</div>
                                <div class="td">{{$fightWithPlayers->players[1]->area}}</div>



                            </div>
                            @endif

                            {{-- Speed --}}
                            @if ($fightWithPlayers->players[0]->speed != '' || $fightWithPlayers->players[1]->area != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->speed}}</div>
                                    <div class="td">Speed</div>
                                <div class="td">{{$fightWithPlayers->players[1]->speed}}</div>



                            </div>
                            @endif

                            {{-- Attacks --}}
                            @if ($fightWithPlayers->players[0]->attacks != '' || $fightWithPlayers->players[1]->attacks != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->attacks}}</div>
                                    <div class="td">Attacks</div>
                                <div class="td">{{$fightWithPlayers->players[1]->attacks}}</div>



                            </div>
                            @endif

                            {{-- Years --}}
                            @if ($fightWithPlayers->players[0]->years != '' || $fightWithPlayers->players[1]->years != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->years}}</div>
                                    <div class="td">Years</div>
                                <div class="td">{{$fightWithPlayers->players[1]->years}}</div>



                            </div>
                            @endif

                            {{-- Role --}}
                            @if ($fightWithPlayers->players[0]->role != '' || $fightWithPlayers->players[1]->role != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->role}}</div>
                                    <div class="td">Role</div>
                                <div class="td">{{$fightWithPlayers->players[1]->role}}</div>



                            </div>
                            @endif

                            {{-- Sport --}}
                            @if ($fightWithPlayers->players[0]->sport != '' || $fightWithPlayers->players[1]->sport != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->sport}}</div>
                                    <div class="td">Sport</div>
                                <div class="td">{{$fightWithPlayers->players[1]->sport}}</div>



                            </div>
                            @endif

                            {{-- Record --}}
                            @if ($fightWithPlayers->players[0]->record != '' || $fightWithPlayers->players[1]->record != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->record}}</div>
                                    <div class="td">Record</div>
                                <div class="td">{{$fightWithPlayers->players[1]->record}}</div>



                            </div>
                            @endif

                            {{-- Shows --}}
                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->shows}}</div>
                                @if ($fightWithPlayers->players[0]->shows != '' || $fightWithPlayers->players[1]->shows != '')
                                    <div class="td">Shows</div>
                                @endif
                                <div class="td">{{$fightWithPlayers->players[1]->shows}}</div>



                            </div>
                            {{-- Game --}}
                            @if ($fightWithPlayers->players[0]->game != '' || $fightWithPlayers->players[1]->game != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->game}}</div>
                                    <div class="td">Game</div>
                                <div class="td">{{$fightWithPlayers->players[1]->game}}</div>



                            </div>
                            @endif

                            {{-- Debut --}}
                            @if ($fightWithPlayers->players[0]->debut != '' || $fightWithPlayers->players[1]->debut != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->debut}}</div>
                                    <div class="td">Debut</div>
                                <div class="td">{{$fightWithPlayers->players[1]->debut}}</div>
                            </div>
                            @endif

                            {{-- Type --}}
                            @if ($fightWithPlayers->players[0]->type != '' || $fightWithPlayers->players[1]->type != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->type}}</div>
                                    <div class="td">Type</div>
                                <div class="td">{{$fightWithPlayers->players[1]->type}}</div>


                            </div>
                            @endif

                            {{-- Identity --}}
                            @if ($fightWithPlayers->players[0]->identity != '' || $fightWithPlayers->players[1]->identity != '')

                            <div class="tc d-flex justify-content-around align-items-center">

                                <div class="td">{{$fightWithPlayers->players[0]->identity}}</div>
                                    <div class="td">Identity</div>
                                <div class="td">{{$fightWithPlayers->players[1]->identity}}</div>



                            </div>
                            @endif

                            {{-- vote --}}
                            <div class="tc d-flex justify-content-around align-items-center">
                                <div class="td">
                                    @if( !is_null($cookie))
                                        <h2 class="text-center view-vote mt-2 font-weight-bolder"><span class="num-count">{{ ($vote_1)?: 0 }}</span> % </h2>
                                    @else
                                        <form method="post" action="{{
                                    route('fights.addVote', [$fightWithPlayers->id, $fightWithPlayers->players[0]->id] )
                                    }}">
                                            @csrf

                                            <div class="form-group text-center">
                                                <button class="btn btn-secondary btn-lg btn-block mt-2 " type="submit">VOTE +</button>
                                            </div>

                                        </form>
                                    @endif
                                    {{-- <button type="button" name="" id="" class="btn btn-secondary btn-lg btn-block mt-2"> Vote</button>--}}

                                </div>

                                <div class="td">Vote</div>

                                <div class="td">
                                        @if( !is_null($cookie))

                                        <h2 class="text-center view-vote mt-2 font-weight-bolder"><span class="num-count">{{ ($vote_2)?: 0 }}</span> % </h2>
                                        @else
                                            <form method="post" action="{{
                                            route('fights.addVote', [$fightWithPlayers->id, $fightWithPlayers->players[1]->id] )
                                            }}">
                                                @csrf

                                                <div class="form-group text-center">
                                                    <button class="btn btn-secondary btn-lg btn-block mt-2" type="submit">VOTE +</button>
                                                </div>

                                            </form>
                                        @endif
                                        {{-- <button type="button" name="" id="" class="btn btn-secondary btn-lg btn-block mt-2"> Vote</button>--}}
                                    </div>


                            </div>

                        </div>


                        {{------------------------------------------------------------------------------------- --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div>
                {!! $settings->ads3 !!}
            </div>
            <div class="card comments-div">
                <div class="card-body">
                    <div class="row " >
                        <div class="col-lg-8 col-md-8 mb-8 ">
                            <h3 class="text-center text-capitalize font-weight-bold"> Comments </h3>

                            @auth()
                                <form method="post" action="{{ route('fights.comment', $fightWithPlayers->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="text-bold " for="comment">Write a comment:</label>
                                        <textarea name="body" class="form-control" rows="5" id="comment" required></textarea>
                                    </div>
                                    <div class="form-group d-flex justify-content-end ">
                                        <button class="btn btn-primary btn-lg " type="submit">Add Comment</button>
                                    </div>
                                </form>
                            @endauth

                            @guest
                                <h4 class="mb-5 text-center "> To comment you must need to log in.
                                    Please <a href="{{route('login')}}">log in</a> or <a href="{{route('register')}}">register </a> here.
                                </h4>

                            @endguest

                            @if( $comments->count() > 0 )
                                <ol class="list-group">
                                    @foreach($comments as $comment)
                                        <li class="list-group-item">
                                            <p><b>{{ $comment->user->name }}:</b><br>{{ $comment->body }}</p>

                                        </li>
                                    @endforeach
                                </ol>
                                <hr/>
                                {{ $comments->links() }}
                            @else
                                <p class="text-center bg-light"> No Comment yet.</p>

                            @endif
                        </div>



                        <div class="col-lg-4 col-md-4 mb-4 ">
                            <div class="card card-accent-dark mb-3">
                                <div class="card-header">Most Voted</div>
                                <div class="card-body text-dark">
                                    <ul class="list-group list-group-flush">
                                        @foreach($top_votes as $top_vote)
                                            <li class="list-group-item"><a href="/{{str_slug($top_vote->fight_group_name)}}/fights/{{$top_vote->fight_id}}">{{$top_vote->fight_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="card card-accent-dark mb-3">
                                <div class="card-header">Recently Added</div>
                                <div class="card-body text-dark">
                                    <ul class="list-group list-group-flush">
                                        @foreach($top_fights as $top_fight)
                                            <li class="list-group-item"><a href="/{{str_slug($top_fight->fightCategory->fight_group_name)}}/fights/{{$top_fight->id}}">{{$top_fight->fight_name}}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>

    <script type="text/javascript">
        $(".num-count").counterUp({delay:10,time:2000});
    </script>
@endsection

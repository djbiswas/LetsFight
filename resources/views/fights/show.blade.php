@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center fight">

            <div class="col-lg-12 col-md-12 mb-2 mt-5">
                <div class="card">
                    <h1 class="text-center">{{$fightWithPlayers->fight_name}}</h1>

                </div>
            </div>
        </div>

        <div class="row justify-content-center fight">

            <!-- player one for desktop-->
            <div class="col-lg-4 col-md-4 p1-col mb-2">
                <div class="btn btn-lg btn-primary btn-block mb-2">Player 1 </div>
                <div class="card">
                    <img class="card-img-top" src="{{ $fightWithPlayers->players[0]->image}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="h4 text-center">{{ $fightWithPlayers->players[0]->name }}</p>
                    </div>
                </div>
                @if( !is_null($cookie))
                    <h4 class="text-center view-vote"> {{ ($vote_1)?: 0 }} vote</h4>
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
            <!-- original tape of tail -->
            <div class="col-lg-4 col-md-4 tape-of-tail mb-2">
                <p class="display-4 text-white vs_text text-center">VS</p>
                <div class="card">
                    <div class="btn btn-block btn-secondary"><h5>Tale of Tape</h5></div>
                    <div class="table d-flex justify-content-around text-center">

                        <div class="tc">
                            <div class="td">{{$fightWithPlayers->players[0]->from}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->Height}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->weight}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->age}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->size}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->continent}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->area}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->speed}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->attacks}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->years}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->role}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->sport}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->record}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->shows}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->game}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->debut}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->type}}</div>
                            <div class="td">{{$fightWithPlayers->players[0]->identity}}</div>
                            <div class="td">{{ $fightWithPlayers->players[0]->weapon->name}}</div>

                        </div>
                        <div class="tc">
                            @if ($fightWithPlayers->players[0]->from != '' || $fightWithPlayers->players[1]->from != '')
                                <div class="td">Nationality</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->Height != '' || $fightWithPlayers->players[1]->Height != '')
                                <div class="td">Height</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->weight != '' || $fightWithPlayers->players[1]->weight != '')
                                <div class="td">Weight</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->age != '' || $fightWithPlayers->players[1]->age != '')
                                <div class="td">Age</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->size != '' || $fightWithPlayers->players[1]->size != '')
                                <div class="td">Size</div>
                            @endif

                            @if ($fightWithPlayers->players[0]->continent != '' || $fightWithPlayers->players[1]->continent != '')
                                <div class="td">Continent</div>
                            @endif

                            @if ($fightWithPlayers->players[0]->area != '' || $fightWithPlayers->players[1]->area != '')
                                <div class="td">Area</div>
                            @endif

                            @if ($fightWithPlayers->players[0]->speed != '' || $fightWithPlayers->players[1]->area != '')
                                <div class="td">Speed</div>
                            @endif

                                @if ($fightWithPlayers->players[0]->attacks != '' || $fightWithPlayers->players[1]->attacks != '')
                                <div class="td">Attacks</div>
                            @endif
                                @if ($fightWithPlayers->players[0]->years != '' || $fightWithPlayers->players[1]->years != '')
                                <div class="td">Years</div>
                            @endif
                                @if ($fightWithPlayers->players[0]->role != '' || $fightWithPlayers->players[1]->role != '')
                                <div class="td">Role</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->sport != '' || $fightWithPlayers->players[1]->sport != '')
                                <div class="td">Role</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->record != '' || $fightWithPlayers->players[1]->record != '')
                                <div class="td">Record</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->shows != '' || $fightWithPlayers->players[1]->shows != '')
                                <div class="td">Shows</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->game != '' || $fightWithPlayers->players[1]->game != '')
                                <div class="td">Game</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->debut != '' || $fightWithPlayers->players[1]->debut != '')
                                <div class="td">Debut</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->type != '' || $fightWithPlayers->players[1]->type != '')
                                <div class="td">Type</div>
                            @endif
                            @if ($fightWithPlayers->players[0]->identity != '' || $fightWithPlayers->players[1]->identity != '')
                                <div class="td">Identity</div>
                            @endif

                            <div class="td">Weapon</div>

                        </div>
                        <div class="tc">
                            <div class="td">{{$fightWithPlayers->players[1]->from}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->Height}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->weight}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->age}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->size}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->continent}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->area}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->speed}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->attacks}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->years}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->role}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->sport}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->record}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->shows}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->game}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->debut}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->type}}</div>
                            <div class="td">{{$fightWithPlayers->players[1]->identity}}</div>
                            <div class="td">{{ $fightWithPlayers->players[1]->weapon->name}}</div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- player two for desktop-->
            <div class="col-lg-4 col-md-4 p2-col mb-2">
                <div class="btn btn-lg btn-primary btn-block mb-2">Player 2 </div>
                <div class="card" >
                    <img class="card-img-top" src="{{ $fightWithPlayers->players[1]->image}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="h4 text-center">{{ $fightWithPlayers->players[1]->name }}</p>
                    </div>
                </div>

                @if( !is_null($cookie))
                    <h4 class="text-center view-vote"> {{ ($vote_2  )?: 0 }} vote</h4>
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

            <!-- newly added---------------------------------------------------------------------------------->
            <!-- next prev button -->
            <div class="desktop container">
                @if($fightWithPlayers->id != 1)
                <a class="carousel-control-prev" href="/fights/{{$fightWithPlayers->id-1}}" role="button" style="opacity: 1;">
                    <i class="fas fa-angle-double-left prev"></i>
                </a>
                @endif
                <a class="carousel-control-next" href="/fights/{{$fightWithPlayers->id+1}}" role="button" style="opacity: 1;">
                    <i class="fas fa-angle-double-right next"></i>
                </a>
            </div>
            <!-- ----------------------------------------------------------------------------------------- -->

            </div>


        <section class="phone-responsive">
            <div class="">

                <div class="row">
                    <!-- content for mobile -->
                    <div class="col-sm-12 fight-phone">
                        <div class="card">
                            <img class="vs" src="/images/vs.png" alt="">
                            <div class="player d-flex justify-content-around">
                                <div class="x_player">
                                    <img class="card-img-top " src="{{ $fightWithPlayers->players[0]->image}}" alt="">
                                </div>
                                <div class="x_player">
                                    <img class="card-img-top "  src="{{ $fightWithPlayers->players[1]->image}}" alt="">
                                </div>
                            </div>
                            <!-- newly added -------------------------------------------------------------------- -->
                            <!-- next prev button -->
                            <div class="container">
                                <a class="carousel-control-prev" href="/fights/{{$fightWithPlayers->id-1}}" role="button" style="opacity: 1;">
                                    <i class="fas fa-chevron-left prev"></i>
                                </a>
                                <a class="carousel-control-next" href="/fights/{{$fightWithPlayers->id+1}}" role="button" style="opacity: 1;">
                                    <i class="fas fa-chevron-right next"></i>
                                </a>
                            </div>
                            <!-- -------------------------------------------------------------------------- -->
                        </div>
                    </div>

                    <!-- mobile tape of tail -->
                    <div class="col-sm-12 mb-2 mt-2">
                        <div class="card">
                            <div class="btn btn-block btn-secondary d-flex justify-content-around"><h5>{{ $fightWithPlayers->players[0]->name}}</h5><h5>Tale of Tape</h5><h5>{{ $fightWithPlayers->players[1]->name}}</h5></div>
                            <div class="table d-flex justify-content-around text-center">
                                <div class="tc">
                                    <div class="td">{{$fightWithPlayers->players[0]->from}}</div>
                                    <div class="td">{{$fightWithPlayers->players[0]->age}}</div>
                                    <div class="td">{{$fightWithPlayers->players[0]->Height}}</div>
                                    <div class="td">{{ $fightWithPlayers->players[0]->weapon->name}}</div>

                                    <div class="td">
                                        <form method="post" action="{{
                                        route('fights.addVote', [$fightWithPlayers->id, $fightWithPlayers->players[0]->id] )
                                        }}">
                                            @csrf

                                            <div class="form-group text-center">
                                                <button class="btn btn-secondary btn-lg btn-block mt-2 " type="submit">VOTE +</button>
                                            </div>

                                        </form>
{{--                                        <button type="button" name="" id="" class="btn btn-secondary btn-lg btn-block mt-2"> Vote</button>--}}
                                    </div>
                                </div>
                                <div class="tc">
                                    <div class="td">Nationality</div>
                                    <div class="td">Age</div>
                                    <div class="td">Height</div>
                                    <div class="td">Weaphone</div>
                                    <div class="td">&nbsp;</div>
                                </div>
                                <div class="tc">
                                    <div class="td">{{$fightWithPlayers->players[0]->from}}</div>
                                    <div class="td">{{$fightWithPlayers->players[0]->age}}</div>
                                    <div class="td">{{$fightWithPlayers->players[0]->Height}}</div>
                                    <div class="td">{{ $fightWithPlayers->players[0]->weapon->name}}</div>

                                    <div class="td">
                                        <form method="post" action="{{
                route('fights.addVote', [$fightWithPlayers->id, $fightWithPlayers->players[1]->id] )
                }}">
                                            @csrf

                                            <div class="form-group text-center">
                                                <button class="btn btn-secondary btn-lg btn-block mt-2" type="submit">VOTE +</button>
                                            </div>

                                        </form>
{{--                                        <button type="button" name="" id="" class="btn btn-secondary btn-lg btn-block mt-2"> Vote</button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="row justify-content-center fight--comments py-3 comment_sec" >
          <div class="col-lg-8 col-md-8 mb-8 ">
           <h3 class="text-center text-capitalize font-weight-bold"> Comments </h3>

              @guest
                   <h4 class="mb-5 text-center text-white"> To comment you must need to logged in.
                       Please <a href="{{route('login')}}">Login</a> or <a href="{{route('register')}}">register </a> here.
                   </h4>

              @endguest

            @if( $comments->count() > 0 )
            <ol class="list-group">
                @foreach($comments as $comment)
                <li class="list-group-item">
                    <p>{{ $comment->body }}</p>

                </li>
                @endforeach
            </ol>
            <hr/>
                    {{ $comments->links() }}
            @else
                 <p class="text-center bg-light"> No Comment yet.</p>

            @endif

          @auth()
              <form method="post" action="{{ route('fights.comment', $fightWithPlayers->id) }}">
                  @csrf
                  <div class="form-group">
                      <label class="text-bold text-white" for="comment">Write a comment:</label>
                      <textarea name="body" class="form-control" rows="5" id="comment" required></textarea>
                  </div>
                  <div class="form-group d-flex justify-content-end ">
                      <button class="btn btn-primary btn-lg " type="submit">Add Comment</button>
                  </div>
              </form>
          @endauth

            </div>
            <div class="col-lg-4 col-md-4 mb-4 ">
                <div class="card card-accent-dark mb-3">
                    <div class="card-header">Most Voted</div>
                    <div class="card-body text-dark">
                        <ul class="list-group list-group-flush">
                            @foreach($top_votes as $top_vote)
                                <li class="list-group-item"><a href="#">{{$top_vote->fight_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card card-accent-dark mb-3">
                    <div class="card-header">Recent Fights</div>
                    <div class="card-body text-dark">
                        <ul class="list-group list-group-flush">
                            @foreach($top_fights as $top_fight)
                                <li class="list-group-item"><a href="#">{{$top_fight->fight_name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

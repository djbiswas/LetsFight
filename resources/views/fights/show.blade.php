@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col text-center">
                <h1 class="py-5">  TALE <small>OF THE</small>TAPE </h1>
            </div>
        </div>

        <div class="row justify-content-center fight">

                <div class="col text-center ">
                    <img class="img-fluid" src="{{ $fightWithPlayers->players[0]->image}}">
                    <h3 class="mt-2">{{ $fightWithPlayers->players[0]->name }}</h3>
                    <h4> {{  ($votes[0]->voting)?:0}} vote</h4>
                    <form method="post" action="{{
                route('fights.addVote', [$fightWithPlayers->id, $fightWithPlayers->players[0]->id] )
                }}">
                        @csrf

                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-lg " type="submit">VOTE +</button>
                        </div>

                    </form>

                </div>
                <div class="col text-center py-5 ">
                            <ul class="list-group">
                                <li class="list-group-item justify-content-between d-flex"><span>{{$fightWithPlayers->players[0]->from}}</span><span>Nationality</span><span>{{$fightWithPlayers->players[1]->from}}</span></li>
                                <li class="list-group-item justify-content-between d-flex"><span>{{$fightWithPlayers->players[0]->age}}</span><span>Age</span><span>{{$fightWithPlayers->players[1]->age}}</span></li>
                                <li class="list-group-item justify-content-between d-flex"><span>{{$fightWithPlayers->players[0]->Height}}</span><span>Height</span><span>{{$fightWithPlayers->players[1]->Height}}</span></li>
                                <li class="list-group-item justify-content-between d-flex"><span>{{ $fightWithPlayers->players[0]->weapon->name}}</span><span>Weapon</span><span>{{ $fightWithPlayers->players[0]->weapon->name}}</span></li>
                            </ul>
                </div>
            <div class="col text-center">
                <img class="img-fluid" alt="{{$fightWithPlayers->players[1]->name}}" src="{{ $fightWithPlayers->players[1]->image }}">
                <h3 class=" mt-2">{{ $fightWithPlayers->players[1]->name }}</h3>
                <h4> {{ ($votes[1]->voting)?: 0 }} vote</h4>

                <form method="post" action="{{
                route('fights.addVote', [$fightWithPlayers->id, $fightWithPlayers->players[1]->id] )
                }}">
                    @csrf

                    <div class="form-group text-center">
                        <button class="btn btn-primary btn-lg " type="submit">VOTE +</button>
                    </div>

                </form>
            </div>



        </div>

        <div class="row justify-content-center fight--comments py-5">
          <div class="col">
           <h3 class="text-center text-capitalize font-weight-bold text-secondary"> Comments </h3>

              @auth()
           <form method="post" action="{{ route('fights.comment', $fightWithPlayers->id) }}">
               @csrf
               <div class="form-group">
                   <label class="text-bold" for="comment">Write a comment:</label>
                   <textarea name="body" class="form-control" rows="5" id="comment" required></textarea>
               </div>
               <div class="form-group d-flex justify-content-end ">
               <button class="btn btn-primary btn-lg " type="submit">Add Comment</button>
               </div>
           </form>
            @endauth

              @guest
           <h4 class="mb-5 text-center"> To comment you must need to logged in.
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

        </div>
        </div>


    </div>
@endsection

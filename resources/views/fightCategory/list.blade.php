@extends('layouts.admin')
@section('title', 'category List')

@section('content')

    {{-- FightCategory start--}}

    <div class="row justify-content-between mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col text-uppercase text-left">

            <h3>FightCategory Management</h3>
        </div>
        <div class="col text-right">
            <a class="btn btn-success" href="{{route('fightCategory.create')}}"> <i class="fas fa-user-plus"></i> Create
                FightCategory</a>
            <a class="btn btn-dark" href="{{ URL::previous() }}">Go Back</a>
        </div>
    </div>
    <div class="row justify-content-center mb-4 mx-5 pb-3 border-bottom fightCategory">
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Thumbnail</th>
                <th scope="col" width="210px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $fightCategories as $key => $fightCategory)

                <tr>
                    <td class="align-middle"> {{++$i}}</td>
                    <td class="align-middle">{{$fightCategory->fight_group_name}}</td>
                    <td class="align-middle"><img src="{{asset('/storage/images/'.$fightCategory->category_image)}}" alt="image" class="img-thumbnail img-thumbnail-small img-fluid"></td>
                    <td class="align-middle">
                        @include('shared._action',[ 'target' => 'fightCategory', 'param' => 'fightCategory' ])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-md-6 col-md-offset-3">
            {{ $fightCategories->links() }}
        </div>
    </div>

    {{-- FightCategory close --}}




@stop

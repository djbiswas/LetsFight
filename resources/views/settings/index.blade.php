@extends('layouts.admin')
@section('title', 'Settings')

@section('content')


    <div class="row justify-content-center mb-4 mx-5 pb-3 border-bottom fightCategory">
        <div class="col-12">
            <div class="card card-accent-dark mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col"><h2>Settings</h2></div>
                        <div class="col text-right">
                            <a class="btn btn-dark" href="{{ URL::previous() }}">Go Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body text-dark">
                    <ul class="list-group list-group-flush">
                        {!! Form::model($settings,['method' =>'PATCH', 'route' => ['settings.update', 1]])  !!}
                        {{csrf_field()}}

                        <div class="card-header card-accent-dark text-center mt-2 mb-2"><h4>Meta Info</h4></div>
                        <!-- Title Input Form -->
                        <div class="form-group  ">
                            {{Form::label('title','Site Meta Title:') }}
                            {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Site Meta Title', 'required']) }}
                            @error('title')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Keywords Input Form -->
                        <div class="form-group  ">
                            {{Form::label('keywords','Meta Keywords:') }}
                            {{Form::text('keywords', null, ['class' => 'form-control', 'placeholder' => 'Meta Keywords', 'required']) }}
                            @error('keywords')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description Input Form -->
                        <div class="form-group">
                            {{Form::label('description','Meta Description:') }}
                            {{Form::textarea('description', null, ['class' => 'form-control', 'rows' =>10, 'placeholder' => 'Meta Description', 'required']) }}
                        </div>

                    <!-- Facebook Input Form -->
                            <div class="card-header card-accent-dark text-center mt-2 mb-2"><h4>Social</h4></div>
                            <div class="form-group  ">
                                {{Form::label('facebook','Facebook:') }}
                                {{Form::text('facebook', null, ['class' => 'form-control', 'placeholder' => 'https://www.facebook.com']) }}
                                @error('facebook')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Twitter Input Form -->
                            <div class="form-group  ">
                                {{Form::label('twitter','Twitter:') }}
                                {{Form::text('twitter', null, ['class' => 'form-control', 'placeholder' => 'https://twitter.com']) }}
                                @error('twitter')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Instagram Input Form -->
                            <div class="form-group  ">
                                {{Form::label('instagram','Instagram:') }}
                                {{Form::text('instagram', null, ['class' => 'form-control', 'placeholder' => 'https://www.instagram.com']) }}
                                @error('instagram')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Ads Code Input Form -->
                            <div class="form-group">
                                {{ Form::label('ads1','Home Page Ads Code:') }}
                                {{ Form::textarea('ads1', null, ['id' => '', 'class' => 'form-control', 'rows' =>10, 'placeholder' => 'Home Page Ads Code:']) }}
                            </div>

                            <div class="card-header card-accent-dark text-center mt-2 mb-2"><h4>Ads</h4></div>

                            <!-- Ads Code Input Form -->
                            <div class="form-group">
                                {{ Form::label('ads2','Category Page Ads Code:') }}
                                {{ Form::textarea('ads2', null, ['id' => '', 'class' => 'form-control', 'rows' =>10, 'placeholder' => 'Category Page Ads Code:']) }}
                            </div>

                            <!-- Ads Code Input Form -->
                            <div class="form-group">
                                {{Form::label('ads3','Fight Page Ads Code:') }}
                                {{Form::textarea('ads3', null, ['id' => '', 'class' => 'form-control', 'rows' =>10, 'placeholder' => 'Fight Page Ads Code:']) }}
                            </div>
                            <div class="text-right">
                                <!-- Submit Button Form -->
                                {{Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                            </div>

                            {!! Form::close() !!}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-6">

        </div>
    </div>



@stop

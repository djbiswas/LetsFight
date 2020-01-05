{{csrf_field()}}

{{Form::label('name', 'Players')}}
<div class="input-group mb-3">
    {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Player Name', 'required'  ))}}
</div>

<div class="row">
    <div class="col">
        {{Form::label('Height', 'Player Height')}}
        <div class="input-group mb-3">
            {{Form::text('Height', null, array('class' => 'form-control', 'placeholder' => 'Player Height', 'required'  ))}}
        </div>
    </div>
    <div class="col">
        {{Form::label('weight', 'Player Weight')}}
        <div class="input-group mb-3">
            {{Form::text('weight', null, array('class' => 'form-control', 'placeholder' => 'Player Weight', 'required'  ))}}
        </div>
    </div>
    <div class="col">
        {{Form::label('age', 'Player Age')}}
        <div class="input-group mb-3">
            {{Form::text('age', null, array('class' => 'form-control', 'placeholder' => 'Player Age', 'required'  ))}}
        </div>
    </div>
</div>

{{Form::label('weapon_id', 'Select Weapons *')}}
<div class="form-group mb-3">
    {{Form::select('weapon_id', $weapons, null, ['class' => 'select_op form-control','placeholder' => 'Select Weapons', 'required'])}}
</div>

{{Form::label('image', 'Player Image')}}
<div class="input-group mb-3">
    {{Form::file('image', null, array('class' => 'form-control', 'placeholder' => 'Player Image', 'required'  ))}}
</div>

{{Form::label('from', 'Player From')}}
<div class="input-group mb-3">
    {{Form::text('from', null, array('class' => 'form-control', 'placeholder' => 'Player From', 'required'  ))}}
</div>

{{Form::label('identity', 'Player Identity')}}
<div class="input-group mb-3">
    {{Form::text('identity', null, array('class' => 'form-control', 'placeholder' => 'Player Identity', 'required'  ))}}
</div>



<hr>
<div class="text-right">

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
</div>
{{ Form::close() }}

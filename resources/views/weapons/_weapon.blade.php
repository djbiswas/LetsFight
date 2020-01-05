{{csrf_field()}}

{{Form::label('name', 'Weapons')}}
<div class="input-group mb-3">
    {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Weapons', 'required'  ))}}
</div>

{{Form::label('weapon_description', 'Weapon Description')}}
<div class="input-group mb-3">
    {{Form::textarea('weapon_description', null, array('class' => 'form-control', 'placeholder' => 'Weapon Description. . . .', 'required'  ))}}
</div>

<hr>
<div class="text-right">

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
</div>
{{ Form::close() }}

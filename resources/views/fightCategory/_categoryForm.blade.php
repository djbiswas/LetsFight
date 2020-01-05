
{{csrf_field()}}

{{Form::label('fight_group_name', 'Fight Group Name')}}
<div class="input-group mb-3">
    {{Form::text('fight_group_name', null, array('class' => 'form-control', 'placeholder' => 'Fight Group Name', 'required'  ))}}
</div>

{{Form::label('category_image', 'Fight Category Image')}}
<div class="input-group mb-3">
    {{Form::file('category_image', array('class' => 'form-control', 'required'  ))}}
</div>

{{Form::label('group_note', 'Group Note')}}
<div class="input-group mb-3">
    {{Form::textarea('group_note', null, array('class' => 'form-control', 'placeholder' => 'Group Note. . . .', 'required'  ))}}
</div>

<hr>
<div class="text-right">

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
</div>
{{ Form::close() }}

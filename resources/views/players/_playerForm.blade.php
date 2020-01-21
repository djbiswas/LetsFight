{{csrf_field()}}

{{Form::label('name', 'Player Name')}}
<div class="input-group mb-3">
    {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Player Name', 'required' ))}}
</div>

{{Form::label('fight_category_id', 'Select Category *')}}
{{--select2op--}}
<div class="form-group mb-3">
    {{Form::select('fight_category_id', $categories, null, ['id' => 'fight_category_id', 'onchange' => 'selectCat()', 'class' => ' form-control','placeholder' => 'Select Category', 'required'])}}
</div>

<div class="row">
    <div class="col-4 all ">
        {{Form::label('weight', 'Weight')}}
        <div class="input-group mb-3">
            {{Form::text('weight', null, array('class' => 'form-control', 'placeholder' => 'Weight', 'required' ))}}
        </div>
    </div>

    <div class="col-4 history fighter celebrity tv game">
        {{Form::label('Height', 'Height')}}
        <div class="input-group mb-3">
            {{Form::text('Height', null, array('class' => 'form-control', 'placeholder' => 'Height'))}}
        </div>
    </div>

    <div class="col-4 history fighter">
        {{Form::label('years', 'Years')}}
        <div class="input-group mb-3">
            {{Form::text('years', null, array('class' => 'form-control', 'placeholder' => 'Years' ))}}
        </div>
    </div>

    <div class="col-4 history fighter celebrity tv">
        {{Form::label('from', 'Country')}}
        <div class="input-group mb-3">
            {{Form::text('from', null, array('class' => 'form-control', 'placeholder' => 'Country'  ))}}
        </div>
    </div>

    <div class="col-4 history celebrity">
        {{Form::label('role', 'Role')}}
        <div class="input-group mb-3">
            {{Form::text('role', null, array('class' => 'form-control', 'placeholder' => 'Role'))}}
        </div>
    </div>

    <div class="col-4 animals">
        {{Form::label('size', 'Size')}}
        <div class="input-group mb-3">
            {{Form::text('size', null, array('class' => 'form-control', 'placeholder' => 'Size' ))}}
        </div>
    </div>

    <div class="col-4 animals">
        {{Form::label('continent', 'Continent')}}
        <div class="input-group mb-3">
            {{Form::text('continent', null, array('class' => 'form-control', 'placeholder' => 'Continent' ))}}
        </div>
    </div>

    <div class="col-4 animals">
        {{Form::label('area', 'Area')}}
        <div class="input-group mb-3">
            {{Form::text('area', null, array('class' => 'form-control', 'placeholder' => 'Area' ))}}
        </div>
    </div>

    <div class="col-4 animals">
        {{Form::label('speed', 'Speed')}}
        <div class="input-group mb-3">
            {{Form::text('speed', null, array('class' => 'form-control', 'placeholder' => 'Speed' ))}}
        </div>
    </div>

    <div class="col-4 animals">
        {{Form::label('attacks', 'Attacks')}}
        <div class="input-group mb-3">
            {{Form::text('attacks', null, array('class' => 'form-control', 'placeholder' => 'Attacks'))}}
        </div>
    </div>

    <div class="col-4 fighter">
        {{Form::label('sport', 'Sport')}}
        <div class="input-group mb-3">
            {{Form::text('sport', null, array('class' => 'form-control', 'placeholder' => 'Sport'))}}
        </div>
    </div>

    <div class="col-4 fighter ">
        {{Form::label('record', 'Record')}}
        <div class="input-group mb-3">
            {{Form::text('record', null, array('class' => 'form-control', 'placeholder' => 'Record'))}}
        </div>
    </div>

    <div class="col-4 celebrity tv game">
        {{Form::label('age', 'Age')}}
        <div class="input-group mb-3">
            {{Form::text('age', null, array('class' => 'form-control', 'placeholder' => 'Age' ))}}
        </div>
    </div>

    <div class="col-4 tv">
        {{Form::label('show', 'Show')}}
        <div class="input-group mb-3">
            {{Form::text('show', null, array('class' => 'form-control', 'placeholder' => 'Show' ))}}
        </div>
    </div>

    <div class="col-4 game">
        {{Form::label('game', 'Game')}}
        <div class="input-group mb-3">
            {{Form::text('game', null, array('class' => 'form-control', 'placeholder' => 'Game' ))}}
        </div>
    </div>

    <div class="col-4 game">
        {{Form::label('debut', 'Debut')}}
        <div class="input-group mb-3">
            {{Form::text('debut', null, array('class' => 'form-control', 'placeholder' => 'Debut' ))}}
        </div>
    </div>

    <div class="col-4 game">
        {{Form::label('type', 'Type')}}
        <div class="input-group mb-3">
            {{Form::text('type', null, array('class' => 'form-control', 'placeholder' => 'Type' ))}}
        </div>
    </div>


</div>


{{--{{Form::label('weapon_id', 'Select Weapons *')}}--}}
{{--<div class="form-group mb-3">--}}
{{--    {{Form::select('weapon_id', $weapons, null, ['class' => 'select2op form-control','placeholder' => 'Select Weapons', 'required'])}}--}}
{{--</div>--}}

{{Form::label('image', 'Player Image')}}
<div class="input-group mb-3">
    {{Form::file('image', null, array('class' => 'form-control', 'placeholder' => 'Player Image', 'required'  ))}}
</div>


{{--{{Form::label('identity', 'Player Identity')}}--}}
{{--<div class="input-group mb-3">--}}
{{--    {{Form::text('identity', null, array('class' => 'form-control', 'placeholder' => 'Player Identity', 'required'  ))}}--}}
{{--</div>--}}

<hr>
<div class="text-right">

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
</div>
{{ Form::close() }}

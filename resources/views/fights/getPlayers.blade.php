<option>--- Select Player ---</option>
@if(!empty($players))
    @foreach($players as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
@endif

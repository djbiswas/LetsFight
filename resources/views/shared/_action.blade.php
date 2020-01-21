<a class="btn btn-info show action-show" target="_blank" href="{{route($target.'.show', $$param->id)}}">Show</a>
<a class="btn btn-primary edit action-edit" href="{{route($target.'.edit', $$param->id)}}">Edit</a>
{!! Form::open(['method' => 'DELETE','route' => [$target.'.destroy', $$param->id],'style'=>'display:inline', 'class'=>'delete-item']) !!}

{!! Form::submit('Delete', ['class' => 'btn btn-danger delete action-delete']) !!}

{!! Form::close() !!}


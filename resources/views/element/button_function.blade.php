{!! Form::open(array('method' => 'DELETE', 'route' => array($route.'destroy', $id))) !!}
	<a href="{!! URL::route($route.'show', array('id' => $id)) !!}" class="btn btn-default btn-rounded btn-sm">
		<span class="fa fa-info"> View</span>
	</a>
	<a href="{!! URL::route($route.'edit', array('id' => $id)) !!}" class="btn btn-info btn-rounded btn-sm">
		<span class="fa fa-pencil"> Edit</span>
	</a>
	<button type=submit class ='btn btn-danger btn-rounded btn-sm delete'><span class="fa fa-times"> Delete</span></button>
{!! Form::close() !!}
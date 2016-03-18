<a href="{!! URL::route($route.'show', array('id' => $id)) !!}" class="btn btn-default btn-rounded btn-sm">
	<span class="fa fa-info"> View</span>
</a>
<a href="{!! URL::route($route.'edit', array('id' => $id)) !!}" class="btn btn-info btn-rounded btn-sm">
	<span class="fa fa-pencil"> Edit</span>
</a>
<a class="btn btn-danger btn-rounded btn-sm"><span class="fa fa-times"> Delete</span></a>
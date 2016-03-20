@extends('layouts.main-backend')
@section('title')
    <?php echo $title; ?>
@stop
@section('keywords')
	<?php echo $keywords; ?>
@stop
@section('description')
    <?php echo $description; ?>
@stop

@section('content')
	<?php
		/* Inisialisasi variabel */
		$breadcrumb = array();
		$breadcrumb['0']['text'] = "User Level";
		$breadcrumb['0']['controller'] = "user-level";
		$breadcrumb['0']['action'] = "";
		$page_title = "Master User Level";
	?>
	
	<!-- START BREADCRUMB -->
	@include('element.breadcrumb', ['breadcrumb' => $breadcrumb])
	<!-- END BREADCRUMB -->
	
	<!-- PAGE TITLE -->
	@include('element.page_title', ['page_title' => $page_title])
	<!-- END PAGE TITLE -->

	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap">
		<div class="row">
            <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-5 col-md-offset-5 col-sm-6 col-sm-offset-4 col-xs-12">
							{!! Form::open(['route' => $admin_prefix.'.user-level.index', 'method' => 'get']) !!}
								<div class="input-group">
									{!! Form::text('search', $search, ['class' => 'form-control', 'placeholder' => 'Search']) !!}
									<span class="input-group-btn">
										<button class="btn btn-primary" type="submit">Search</button>
									</span>
								</div>
							{!! Form::close() !!}
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12 text-right">
								<a href="{!! URL::route($admin_prefix.'.user-level.create') !!}" class="btn btn-primary btn-block">
									Add Data
								</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<?php
							if (count($content) <= 0){
						?>
								@include('element.not_found')
						<?php
							} else {
						?>
						@foreach (['danger', 'warning', 'success', 'info'] as $msg)
							@if(Session::has('alert-' . $msg))
								<div class="row">
									<div class="alert alert-{{ $msg }}" role="alert">
										<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										{{ Session::get('alert-' . $msg) }}
									</div>
								</div>
							@endif
						@endforeach
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-actions">
								<thead>
									<tr>
										<th>
											@include('element.toggle_sort', [
												'sort' => $sort, 
												'direction' => $direction, 
												'search' => $search,
												'column' => 'id',
												'route' => $admin_prefix.'.user-level.index',
												'name' => 'ID'
											])
										</th>
										<th>
											@include('element.toggle_sort', [
												'sort' => $sort, 
												'direction' => $direction, 
												'search' => $search,
												'column' => 'level_name',
												'route' => $admin_prefix.'.user-level.index',
												'name' => 'Name'
											])
										</th>
										<th>
											@include('element.toggle_sort', [
												'sort' => $sort, 
												'direction' => $direction, 
												'search' => $search,
												'column' => 'updated_at',
												'route' => $admin_prefix.'.user-level.index',
												'name' => 'Date Modified'
											])
										</th>
										<th>
											@include('element.toggle_sort', [
												'sort' => $sort, 
												'direction' => $direction, 
												'search' => $search,
												'column' => 'status',
												'route' => $admin_prefix.'.user-level.index',
												'name' => 'Status'
											])
										</th>
										<th>Functions</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($content as $content_detail)
										<tr>
											<td>{{ $content_detail->id }}</td>
											<td>{!! $content_detail->level_name !!}</td>
											<td>
												<?php
													$updated_at = date('d M Y H:i:s', strtotime($content_detail->updated_at));
												?>
												{{ $updated_at}}
											</td>
											<td>
												<?php
													$active = $content_detail->status;
												?>
												@include('element.status', ['active' => $active])
											</td>
											<td>
												@include('element.button_function', [
													'route' => $admin_prefix.'.user-level.',
													'id' => $content_detail->id
												])
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="row info-paging">
							<div class="col-md-12">
								<!-- START PAGINATION -->
								@include('element.pagination', ['paginator' => $content->appends(['sort' => $sort, 'direction' => $direction, 'search' => $search])])
								<!-- END PAGINATION -->
							</div>
						</div>
						<?php
							}
						?>
					</div>
				</div>                                                
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT WRAPPER -->
	<script>
		$(".delete").on("click", function(e){
			if(confirm('Are you sure to delete this data ?')){
				
			}
			else{
				return false;
			}
		});
	</script>	
@stop
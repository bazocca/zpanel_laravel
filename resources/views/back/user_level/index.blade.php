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
						<h3 class="panel-title">Tempat Search Ini</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-actions">
								<thead>
									<tr>
										<th>
											{!! link_to('zpanel/user-level', 'ID', ['page' => 2]) !!}
										</th>
										<th>Name</th>
										<th>Date Modified</th>
										<th>Status</th>
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
												<a class="btn btn-info btn-rounded btn-sm"><span class="fa fa-info"> View</span></a>
												<a class="btn btn-default btn-rounded btn-sm"><span class="fa fa-pencil"> Edit</span></a>
												<a class="btn btn-danger btn-rounded btn-sm"><span class="fa fa-times"> Delete</span></a>
												<?php
													// $button_function['id'] = $posts_single["UserLevel"]["id"];
													// echo $this->element('function_button',$button_function);
												?>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div> 
						<div class="row info-paging">
							<div class="col-md-12">
								<!-- START PAGINATION -->
								{!! $content->appends(['sort' => $sort, 'direction' => $direction])->links() !!}
								<!-- END PAGINATION -->
							</div>
						</div>
					</div>
				</div>                                                
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT WRAPPER -->	
@stop
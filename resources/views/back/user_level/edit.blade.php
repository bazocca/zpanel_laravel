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
		$breadcrumb['1']['text'] = "Update";
		$breadcrumb['1']['controller'] = "user-level";
		$breadcrumb['1']['action'] = "";
		$page_title = "Update User Level";
	?>
	
	<!-- START BREADCRUMB -->
	@include('element.breadcrumb', ['breadcrumb' => $breadcrumb])
	<!-- END BREADCRUMB -->
	
	<!-- PAGE TITLE -->
	@include('element.page_title', ['page_title' => $page_title])
	<!-- END PAGE TITLE -->

	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap">
		<div class="row margin-bottom-10">
			<div class="col-md-2 col-md-offset-10 col-sm-2 col-sm-offset-10 col-xs-4 col-xs-offset-8 text-right">
				<a href="{!! URL::route($admin_prefix.'.user-level.index') !!}" class="btn btn-primary btn-block">
					Back
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				{!! Form::model($content, ['method' => 'PATCH', 'route' => [$admin_prefix.'.user-level.update', $content->id], 'class' => 'form-horizontal']) !!}	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">
								Form Update User Level
							</h2>
							<ul class="panel-controls">
								<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                            </ul>
						</div>
						<div class="panel-body">
							@if ($errors->any())
								<div class="row">
									<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
										<ul>
											{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
										</ul>
									</div>
								</div>
							@endif
							<div class="form-group">
								<label class="col-sm-3 col-xs-12 control-label">ID</label>
								<div class="col-sm-5 col-xs-12 control-label text-left">
									{!! $content->id !!}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 col-xs-12 control-label">Name</label>
								<div class="col-sm-5 col-xs-12">
									{!! Form::text('level_name', null, ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 col-xs-12 control-label">Status</label>
								<div class="col-sm-2 col-xs-12">
									{!! Form::select('status', [
										'1' => 'Active',
										'2' => 'Deactive',
										],
										null,[
										'class' =>  'form-control'
										]
									) !!}
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									{!! Form::submit('Submit', array('class' => 'btn btn-primary btn-block')) !!}
								</div>
							</div>							
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>                    
	</div>
	<!-- END PAGE CONTENT WRAPPER -->		
@stop
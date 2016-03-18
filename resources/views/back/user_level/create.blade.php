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
		$breadcrumb['1']['text'] = "Create";
		$breadcrumb['1']['controller'] = "user-level";
		$breadcrumb['1']['action'] = "";
		$page_title = "Create User Level";
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
			<div class="col-md-2 col-md-offset-10 col-sm-2 col-sm-offset-10 col-xs-4 col-xs-offset-8 text-right">
				<a href="{!! URL::route($admin_prefix.'.user-level.index') !!}" class="btn btn-primary btn-block">
					Back
				</a>
			</div>
			<br/><br/><br/>
		</div>
		<div class="row">
			<div class="col-md-12">
				{!! Form::open(['url' => $admin_prefix.'/user-level', 'method' => 'post', 'class' => 'form-horizontal']) !!}
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">
								Form Create New User Level
							</h2>
						</div>
						<div class="panel-body">
							@if ($errors->any())
								<div class="form-group">
									<ul>
										{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
									</ul>
								</div>									
							@endif						
							<div class="form-group">
								<label class="col-sm-3 col-xs-12 control-label">Name</label>
								<div class="col-sm-5 col-xs-12">
									{!! Form::text('level_name', null, ['class' => 'form-control']) !!}
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
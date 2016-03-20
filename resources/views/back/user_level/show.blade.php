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
		$breadcrumb['1']['text'] = "View";
		$breadcrumb['1']['controller'] = "user-level";
		$breadcrumb['1']['action'] = $content->id;
		$page_title = "View User Level";
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
				<form class="form-horizontal">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title">
								Created : <b><?php echo date('d M Y H:i:s', strtotime($content->created_at)); ?></b> by <b>{!! $content->user_create->full_name !!}</b> <br/>
								Last Modified : <b><?php echo date('d M Y H:i:s', strtotime($content->updated_at)); ?></b> by <b>{!! $content->user_modify->full_name !!}</b>
							</h2>
							<ul class="panel-controls">
								<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                            </ul>
						</div>
						<div class="panel-body">                                                                        
							<div class="form-group">
								<label class="col-sm-3 col-xs-12 control-label">ID</label>
								<div class="col-sm-6 col-xs-12 control-label text-left">
									{!! $content->id !!}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 col-xs-12 control-label">Name</label>
								<div class="col-sm-6 col-xs-12 control-label text-left">
									{!! $content->level_name !!}
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 col-xs-12 control-label">Status</label>
								<div class="col-sm-6 col-xs-12 text-left">
									<?php
										$active = $content->status;
									?>
									@include('element.status', ['active' => $active])
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>                    
	</div>
	<!-- END PAGE CONTENT WRAPPER -->	
@stop
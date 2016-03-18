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


	<!-- Entête de page -->

	<div class="col-sm-12">
		{!! Form::open(['url' => 'user-level', 'method' => 'post', 'class' => 'form-horizontal']) !!}	
		
		{!! Form::close() !!}
	</div>

@stop
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
		echo "<pre>";
		print_r(auth()->guard('admin')->user());
		echo "</pre>";
	?>
@stop
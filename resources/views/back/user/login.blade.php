@extends('layouts.login')
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
	<div class="login-container">
		<div class="login-box animated fadeInDown">
			<br/>
			<div class="login-header text-center">
				{!! Html::image('img/logo/logo.png') !!}
			</div>
			<div class="login-body">
				@if(Session::has('auth-error'))
					<div class="message error text-center" style="border-radius:3px;background:#cc2424;padding:7px;margin-bottom:5px;">
						<h6><b><font color="white">{!! Session::get('auth-error') !!}</font></b></h6>
					</div>
				@endif			
				<div class="login-title"><strong>Log In</strong> to your account</div>
					{!! Form::open(['class' => 'form-horizontal']) !!}
					<div class="form-group">
						<div class="col-md-12">
							{!! Form::text('username',null,
									array('required', 
										  'class'=>'form-control', 
										  'placeholder'=>'Username')) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							{!! Form::password('password', 
									array('required', 
										  'class'=>'form-control', 
										  'placeholder'=>'Password')) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<button type="submit "class="btn btn-info btn-block">Log In</button>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop
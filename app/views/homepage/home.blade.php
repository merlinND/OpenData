@include('homepage/header')
<div class="photo-homepage">
	<div class="container-fluid">
		<div class="title">
			<h1>@lang('home.pageTitle')</h1>
		</div>

		{{ Form::open(array('route' => 'proposition')) }}
		<div class="row">
			<div class="col-xs-6" data-duration="30">
				<div class="pieContainer">
					<div class="pieBackground"></div>
					<div id="thirty-minutes" class="hold"><div class="pie"></div></div>
				</div>
				<span class="time">@lang('home.thirtyMinutes')</span>
			</div>

			<div class="col-xs-6" data-duration="120">
				<div class="pieContainer">
					<div class="pieBackground"></div>
					<div id="two-hours" class="hold"><div class="pie"></div></div>
				</div>
				<span class="time two-hours">@lang('home.twoHours')</span>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6" data-duration="360">
				<div class="pieContainer">
					<div class="pieBackground"></div>
					<div id="six-hours" class="hold"><div class="pie"></div></div>
				</div>
				<span class="time">@lang('home.afternoon')</span>
			</div>

			<div class="col-xs-6" data-duration="720">
				<div class="pieContainer">
					<div class="pieBackground full"></div>
				</div>
				<span class="time">@lang('home.day')</span>
			</div>
		</div>
	</div>
	<input name="latitude" id="latitude" type="hidden" value="">
	<input name="longitude" id="longitude" type="hidden" value="">
	<input name="duration" id="duration" type="hidden" value="">
	{{ Form::close() }}
</div>
@include('homepage/footer')
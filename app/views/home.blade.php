@include('layout.header')
<div class="photo-homepage">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6">
				<div class="pieContainer">
					<div class="pieBackground"></div>
					<div id="thirty-minutes" class="hold"><div class="pie"></div></div>
				</div>
				<span class="time">@lang('home.fifteenMinutes')</span>
			</div>

			<div class="col-xs-6">
				<div class="pieContainer">
					<div class="pieBackground"></div>
					<div id="two-hours" class="hold"><div class="pie"></div></div>
				</div>
				<span class="time two-hours">@lang('home.twoHours')</span>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6">
				<div class="pieContainer">
					<div class="pieBackground"></div>
					<div id="six-hours" class="hold"><div class="pie"></div></div>
				</div>
				<span class="time">@lang('home.afternoon')</span>
			</div>

			<div class="col-xs-6">
				<div class="pieContainer">
					<div class="pieBackground full"></div>
				</div>
				<span class="time">@lang('home.day')</span>
			</div>
		</div>
	</div>
	
</div>
@include('layout.footer')
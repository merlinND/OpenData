@include('proposition/header')
<div class="photo" style="background-image:url({{{ $backgroundURL}}})"></div>
<div class="container-fluid">
	<div class="arrow"></div>
	<div id="catchphrase">{{{$catchphrase}}}</div>
</div>

<div class="description-container">
	<div class="container-fluid">
		<h1>{{{$name}}}</h1>
		<span class="time-travel">{{{Lang::get('proposition.phraseTimeTravel', array('duration' => $duration))}}}</span>

		<div class="clear"></div>
		
		<div id="description">
			{{{$description}}}
		</div>

		<div class="actions">
			<div class="col-left">
				<a href="https://www.openstreetmap.org/search?query={{{$latitude}}}%2C{{{$longitude}}}#map=15/{{{$latitude}}}/{{{$longitude}}}">
						<button id="letsGo">{{{Lang::get('proposition.letsGo')}}}</button>
				</a>
			</div>
			<div class="col-right">
				<a href="?except={{{$placeID}}}">{{{Lang::get('proposition.somethingElse')}}}</a>
			</div>
		</div>
	</div>	
</div>
@include('proposition/footer')
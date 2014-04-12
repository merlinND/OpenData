@include('proposition/header')
<div class="photo" style="background-image:url({{{ $backgroundURL}}})"></div>
	<div class="container-fluid">
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

		<button id="letsGo">{{{Lang::get('proposition.letsGo')}}}</button>

		<a href="#">{{{Lang::get('proposition.somethingElse')}}}</a>
	</div>	
</div>
@include('proposition/footer')
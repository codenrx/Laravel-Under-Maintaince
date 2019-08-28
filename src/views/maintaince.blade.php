<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Site is under maintaince</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="{{ asset('maintaince/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('maintaince/css/responsive.css') }}" rel="stylesheet">
</head>
<body>
	<div class="main-area-wrapper">
		<div class="main-area center-text" style="background-image:url();">

			<div class="display-table">
				<div class="display-table-cell">

					<h1 class="title"><b>{{ config('maintaince.maintaince_title') }}</b></h1>
					<p class="desc font-white">{!! config('maintaince.maintaince_text') !!}</p>
					<div id="normal-countdown" data-date="2018/01/01"></div>
					@if (config('maintaince.facebook') != '' || config('maintaince.twitter') != '' || config('maintaince.gmail') != '' || config('maintaince.instragam') != '' || config('maintaince.pinterest') != '' )
					<ul class="social-btn">
						<li class="list-heading">Follow us for update</li>
						@if (config('maintaince.facebook') != '')
							<li><a href="{{ config('maintaince.facebook') }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
						@endif
						@if (config('maintaince.twitter') != '')
							<li><a href="{{ config('maintaince.twitter') }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
						@endif
						@if (config('maintaince.gmail') != '')
							<li><a href="{{ config('maintaince.gmail') }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						@endif
						@if (config('maintaince.instragam') != '')
							<li><a href="{{ config('maintaince.instragam') }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
						@endif
						@if (config('maintaince.pinterest') != '')
							<li><a href="{{ config('maintaince.pinterest') }}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
						@endif
					</ul>
					@endif
				</div><!-- display-table -->
			</div><!-- display-table-cell -->
		</div><!-- main-area -->
	</div><!-- main-area-wrapper -->

</body>

</html>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{Auth::user()->name}} Resume</title>
	<style>
		body{
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		}
	</style>
</head>
<body>
<section style="text-align: center">
	<h2>Personal Details</h2>
	<p>{{Auth::user()->name}}</p>
	<p>{{Auth::user()->email}}</p>
	<p>{{Auth::user()->address}}</p>
	<p>{{Auth::user()->mobile}}</p>
</section>
<br>
<section>
	<h2>Personal Summary</h2>
	<p>{{($summary != null) ? $summary->summary: ''}}</p>
</section>
<br>
<section>
	<h2>Education Background</h2>
	@if(count($educations) > 0)
		@foreach($educations as $education)
			<h4>
				@if($education->degree_obtained == "Yes")
					{{--<i class="certificate red icon"></i>--}}
				@endif
				{{$education->name_of_study}}
				&nbsp;-&nbsp;
				<span>
					Degree Obtained: {{$education->degree_obtained}}
				</span>
			</h4>
			<p>{{$education->place_of_study}}&nbsp;&nbsp;|&nbsp;&nbsp;{{$education->years}}</p>
			<p>Specializing in {{$education->any_specialisation}}</p>
		@endforeach
	@endif
</section>
<br>
<section>
	<h2>Areas of Expertise (Skills)</h2>
	<ul>
		@if(count($skills) > 0)
			@foreach($skills as $skill)
				<li>{{$skill->skill}}</li>
			@endforeach
		@endif
	</ul>
</section>
<br>
<section>
	<h2>Work Experience</h2>
	@if(count($experiences) > 0)
		@foreach($experiences as $experience)
			<h4>{{$experience->title_of_position}}</h4>
			<p>{{$experience->name_of_the_company}}&nbsp;&nbsp;|&nbsp;&nbsp;{{$experience->years}}</p>
			<p>{{$experience->description_of_the_position}}</p>
		@endforeach
	@endif
</section>
</body>
</html>
	{{--<div class="ui fluid container" id="section-to-print">
		<div class="ui stackable grid">
			<!-- Personal Details UX -->
			<div class="row">
				<div class="column">
					<div class="ui segments" style="margin-top:1rem">
						<div class="ui segment header">
							<i id="section-not-to-print" class="user circle icon"></i>
							Personal Details
						</div>
						<div class="ui segment" style="text-align:center;">
							<p><i id="section-not-to-print" class="user icon"></i>{{Auth::user()->name}}</p>
							<p><i id="section-not-to-print" class="mail icon"></i>{{Auth::user()->email}}</p>
							<p><i id="section-not-to-print" class="address card icon"></i>{{Auth::user()->address}}</p>
							<p><i id="section-not-to-print" class="call icon"></i>{{Auth::user()->mobile}}</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<div class="ui fluid segments">
						<div class="ui segment header">
							<i id="section-not-to-print" class=" icons">
								<i class="book icon"></i>
								<i class="corner user circle icon"></i>
							</i>
							Summary
						</div>
						<div class="ui segment">
							<form action="{{route('summary.store')}}" class="ui form" method="post">
								@csrf
								<p>{{($summary != null) ? $summary->summary: ''}}</p>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<div class="ui segments">
						<div class="ui segment header">
							<i id="section-not-to-print" class="checkmark icon"></i>
							Areas of Expertise (Skills)
						</div>
						<div class="ui segment">
							<ul>
								@if (count($skills) > 0)
									@foreach($skills as $skill)
										<li>
											{{$skill->skill}}
										</li>
									@endforeach
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Education Background -->
			<div class="row">
				<div class="column">
					<div class="ui segments">
						<div class="ui segment header">
							<i id="section-not-to-print"  class="graduation hat icon"></i>
							Education Background
						</div>
						@if(count($educations) > 0)
							@foreach($educations as $education)
								<div class="ui segment">
									<h5>
										@if($education->degree_obtained == "Yes")
											<i class="certificate red icon"></i>
										@endif
										{{$education->name_of_study}}
										&nbsp;-&nbsp;
										<label class="ui {{($education->degree_obtained == "Yes")? 'red' : ''}} label">
											Degree Obtained: {{$education->degree_obtained}}
										</label>
									</h5>
									<p><i id="section-not-to-print" class="building outline icon"></i>{{$education->place_of_study}}&nbsp;&nbsp;|&nbsp;&nbsp;<i id="section-not-to-print" class="calendar outline icon"></i>{{$education->years}}</p>
									<p><i id="section-not-to-print" class="star icon"></i>Specializing in {{$education->any_specialisation}}</p>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
			<!-- Work Experience -->
			<div class="row">
				<div class="column">
					<div class="ui segments">
						<div class="ui segment header">
							<i id="section-not-to-print" class="briefcase icon"></i> Work Experience
						</div>
						--}}{{--<div class="ui segment">
							<h5>Mobile and Web App Technologies Trainee</h5>
							<p>Kabarak University&nbsp;&nbsp;|&nbsp;&nbsp;Jan, 2018&nbsp;-&nbsp;Current</p>
						</div>
						<div class="ui segment">
							<h5>Mobile and Web App Developer</h5>
							<p>Qmax Ltd&nbsp;&nbsp;|&nbsp;&nbsp;Jan, 2017&nbsp;-&nbsp;Current</p>
						</div>
						<div class="ui segment">
							<h5>Mobile and Web App Freelancer Developer</h5>
							<p>Freelance&nbsp;&nbsp;|&nbsp;&nbsp;May, 2015&nbsp;-&nbsp;Current</p>
						</div>
						<div class="ui segment">
							<h5>Python Facilitator Africa Code Week</h5>
							<p>Kabarak University&nbsp;&nbsp;|&nbsp;&nbsp;Nov, 2017&nbsp;-&nbsp;Dec, 2017</p>
						</div>--}}{{--
						@if(count($experiences) > 0)
							@foreach($experiences as $experience)
								<div class="ui segment">
									<h5><i id="section-not-to-print" class="clipboard outline icon"></i>{{$experience->title_of_position}}</h5>
									<p><i id="section-not-to-print" class="building outline icon"></i>{{$experience->name_of_the_company}}&nbsp;&nbsp;|&nbsp;&nbsp;<i id="section-not-to-print" class="calendar outline icon"></i>{{$experience->years}}</p>
									<p>{{$experience->description_of_the_position}}</p>
								</div>
							@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>--}}
@extends('layouts.dashboard')

@section('title','Filtering - My CV')

@section('content')
	<br>
	<div class="ui fluid container" id="section-to-print">
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
						{{--<div class="ui segment">
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
						</div>--}}
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
	</div>
	{{--Filter CV --}}
	<div class="ui modal">
		<i class="close icon"></i>
		<div class="header">
			Filter CV
		</div>
		<div class="content">
			<form action="{{route('filter.update',Auth::user()->id)}}" id="filter" class="ui form" method="post">
				@csrf
				{{method_field('PUT')}}
				<div class="field">
					<label for="option">Filter According to Profession</label>
					<select name="career_option" id="option" class="ui search select dropdown">
						<option value="search">Search Profession</option>
						@foreach($profession as $item)
							<option value="{{$item->id}}">{{$item->profession}}</option>
						@endforeach
					</select>
				</div>
			</form>
		</div>
		<div class="actions">
			<div class="ui black deny button">
				Cancel
			</div>
			<div onclick="document.getElementById('filter').submit();" class="ui positive right labeled icon button">
				Filter
				<i class="checkmark icon"></i>
			</div>
		</div>
	</div>
	{{--END Filter CV--}}
	<br />
	<script>
		$(document).ready(function () {
			// save summary..
			{{--/*$("#save-summary").on('click',function (e) {
				const summary=$("#summary").val();
				var data={
                    _token : '{{csrf_token()}}',
				    summary:summary
				};
				
				$.post("/summary",data,function (data) {
					console.log(data);
                }).done(function () {
					$.notify('Summary Saved Successfully!','success');
                });
            });*/--}}
		});
	</script>
@endsection

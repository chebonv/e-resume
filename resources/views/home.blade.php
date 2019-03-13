@extends('layouts.dashboard')

@section('title','Home - My CV Dashboard')

@section('content')
	
    <div class="ui container">
		<br>
		@include('shared.messages')
		<div class="ui stackable grid">
			<!-- Personal Details UX -->
			<div class="row">
				<div class="column">
					<div class="ui segments" style="margin-top:1rem">
						<div class="ui segment header"><i class="user circle icon"></i> My Details</div>
						<div class="ui segment">
							<p><i class="user icon"></i>{{Auth::user()->name}}</p>
							<p><i class="mail icon"></i>{{Auth::user()->email}}</p>
							<p><i class="address card icon"></i>{{Auth::user()->address}}</p>
							<p><i class="call icon"></i>{{Auth::user()->mobile}}</p>
						</div>
					</div>
				</div>
			</div>
			<!-- Personal Summary -->
			<div class="row">
				<div class="eight wide column">
					<div class="ui segments">
						<div class="ui segment header">
							<i class=" icons">
								<i class="book icon"></i>
								<i class="corner user circle icon"></i>
							</i>
							Summary
						</div>
						<div class="ui segment">
							<form action="{{route('summary.store')}}" class="ui form" method="post">
								@csrf

								<div class="field">
									<textarea required name="summary" id="summary" cols="30"
											  rows="5" placeholder="Brief Summary About You ...">{{($summary != null) ? $summary->summary: ''}}</textarea>
								</div>
								@if($summary == null)
									<button type="submit" class="ui blue button" id="save-summary">
									<i class="save icon"></i>Save
								</button>
								@endif
								<a href="" id="edit-summary" class="ui teal button">
									<i class="edit icon"></i> Edit
								</a>
							</form>
						</div>
					</div>
				</div>
				<!-- Areas of Expertise -->
				<div class="eight wide column">
					<div class="ui segments">
						<div class="ui segment header">
							<i class="checkmark icon"></i>
							Areas of Expertise (Skills)
						</div>
						<div class="ui segment">
							<ul>
								@if (count($skills) > 0)
									@foreach($skills as $skill)
										<li>
											{{$skill->skill}}
											<a href="{{route('skill.edit',$skill->id)}}" class="">
												<i class="pencil icon"></i>
											</a>
										</li>
									@endforeach
								@endif
							</ul>
							<form action="{{route('skill.store')}}" class="ui stackable form" method="post">
								@csrf
								<div class="two fields">
									<div class="five wide field">
										<input type="text" name="expertise" id="expertise"
											   placeholder="Enter Skills e.g. Accountant...">
									</div>
									<div class="seven wide field">
										<select name="career_option" id="option" class="ui search select dropdown">
											<option value="search">Search Profession</option>
											@foreach($profession as $item)
												<option>{{$item->profession}}</option>
											@endforeach
										</select>
									</div>
									<div class="four wide field">
										<button type="submit" class="ui blue button" id="save-skill">
											<i class="save icon"></i>Save
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Education Background -->
			<div class="row">
				<div class="column">
					<div class="ui segments">
						<div class="ui segment header">
							<i class="graduation hat icon"></i>
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
										<a href="{{route('education.edit',$education->id)}}"><i class="pencil icon"></i></a>
									</h5>
									<p><i class="building outline icon"></i>{{$education->place_of_study}}&nbsp;&nbsp;|&nbsp;&nbsp;<i class="calendar outline icon"></i>{{$education->years}}</p>
									<p><i class="star icon"></i>Specializing in {{$education->any_specialisation}}</p>
								</div>
							@endforeach
						@endif
						<div class="ui segment">

							<form action="{{route('education.store')}}" class="ui form" method="post">
								@csrf
								<div class="three fields">
									<div class="field">
										<input type="text" name="name_of_study" id="name_of_study" placeholder="Name of Study...">
									</div>
									<div class="field">
										<input type="text" name="place_of_study" id="place_of_study" placeholder="Place of Study...">
									</div>
									<div class="field">
										<input type="text" name="years" id="years" placeholder="Years of Study e.g. 2018 - 2020...">
									</div>
								</div>
								<div class="three fields">
									<div class="field">
										<input type="text" name="any_specialisation" id="any_specialisation" placeholder="Any Specialisation...">
									</div>
									<div class="inline fields">
										<label for="">Degree Obtained</label>
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" checked name="degree_obtained" id="degree_obtained_yes" value="Yes">
												<label for="degree_obtained_yes">Yes</label>
											</div>
										</div>
										<div class="field">
											<div class="ui radio checkbox">
												<input type="radio" name="degree_obtained" id="degree_obtained_no" value="No">
												<label for="degree_obtained_no">No</label>
											</div>
										</div>
									</div>
									<div class="field">
										<select name="career_option" id="option" class="ui search select dropdown">
											<option value="search">Search Profession</option>
											@foreach($profession as $item)
												<option>{{$item->profession}}</option>
											@endforeach
										</select>
									</div>
									<div class="field">
										<button type="submit" class="ui blue button" id="save-education">
											<i class="save icon"></i>Save
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Work Experience -->
			<div class="row">
				<div class="column">
					<div class="ui segments">
						<div class="ui segment header"><i class="briefcase icon"></i> Work Experience</div>
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
									<h5><i class="clipboard outline icon"></i>{{$experience->title_of_position}}</h5>
									<p><i class="building outline icon"></i>{{$experience->name_of_the_company}}&nbsp;&nbsp;|&nbsp;&nbsp;<i class="calendar outline icon"></i>{{$experience->years}}</p>
									<p>{{$experience->description_of_the_position}}</p>
								</div>
							@endforeach
						@endif
						<div class="ui segment">
							<form action="{{route('work-experience.store')}}" method="post" class="ui form">
								@csrf
								<div class="two fields">
									<div class="field">
										<input type="text" name="title_of_position" id="title_of_position" placeholder="Title of Position...">
									</div>
									<div class="field">
										<input type="text" name="name_of_company" id="name_of_company" placeholder="Name of the company...">
									</div>
								</div>
								<div class="two fields">
									<div class="field">
										<textarea name="description_of_position" id="description_of_position" cols="30"
												  rows="2" placeholder="Description of Position..."></textarea>
									</div>
									<div class="field">
										<input type="text" name="years" id="years" placeholder="Years of Study e.g. 2018 - 2020...">
									</div>
								</div>
								<div class="field">
									<select name="career_option" id="option" class="ui search select dropdown">
										<option value="search">Search Profession</option>
										@foreach($profession as $item)
											<option>{{$item->profession}}</option>
										@endforeach
									</select>
								</div>
								{{--<select name="skills-skills" class="" id="id_skills-skills" tabindex="-1" aria-hidden="true">
									<option value="18">3D Modelling</option>
									<option value="16" selected="">Android</option>
									<option value="54">AngularJS</option>
									<option value="21">Animation</option>
									<option value="5">Blog Writing</option>
									<option value="44">Business Coaching</option>
									<option value="43">Business Plans</option>
									<option value="37">Company Incorporation</option>
									<option value="20">Compositing</option>
									<option value="9">Copywriting</option>
									<option value="22">CPlus (C++)</option>
									<option value="13">CSS3</option>
									<option value="24">Design</option>
									<option value="41">Event Planning</option>
									<option value="35">Filing Tax Returns</option>
									<option value="17">Flash</option>
									<option value="52">Geographic Information System (GIS)</option>
									<option value="12" selected="">HTML5</option>
									<option value="15">Java</option>
									<option value="14">Javascript</option>
									<option value="34">Joomla</option>
									<option value="46">Lead Generation</option>
									<option value="36">Legal Advisory Services</option>
									<option value="38">Legal Research &amp; Writing</option>
									<option value="45">Market Research</option>
									<option value="27" selected="">MySQL</option>
									<option value="4">.Net</option>
									<option value="51">Network Design &amp; Configuration</option>
									<option value="53">NodeJS</option>
									<option value="29">Objective C/iOS</option>
									<option value="23">Other</option>
									<option value="2">Photoshop</option>
									<option value="1" selected="">PHP</option>
									<option value="28">PostgreSQL</option>
									<option value="47">Project Management</option>
									<option value="40">Public Relations</option>
									<option value="3">Python</option>
									<option value="42">QuickBooks</option>
									<option value="55">ReactJS</option>
									<option value="39">Recruitment</option>
									<option value="11">Reporting writing</option>
									<option value="19">Rigging</option>
									<option value="7">Ruby</option>
									<option value="26">SMS</option>
									<option value="32">Social Media Marketing</option>
									<option value="30">Swift/iOS</option>
									<option value="48">System Admin - Linux</option>
									<option value="49">System Admin - Windows</option>
									<option value="50">Systems Security</option>
									<option value="10">Translation</option>
									<option value="25">USSD</option>
									<option value="31">Windows Phone</option>
									<option value="33">WordPress</option>
									<option value="6">Writing articles</option>
								</select>--}}
								<div class="field">
									<button type="submit" class="ui blue button" id="save-education">
										<i class="save icon"></i>Save
									</button>
								</div>
							</form>
						</div>
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
			<form id="filter" action="{{route('filter.update',Auth::id())}}" class="ui form" method="post">
				@csrf
				{{method_field('PUT')}}
				<div class="field">
					<label for="option">Filter According to Profession</label>
					<select name="career_option" id="optionFilter" class="ui search select dropdown">
						<option value="">Search Profession</option>
						@foreach($profession as $item)
							<option value="{{$item->id}}">{{$item->profession}}</option>
						@endforeach
					</select>

					<div class="inline fields" style="margin-top: 1rem;">
						<label>Select Document Format:</label>
						<div class="field">
							<div class="ui radio checkbox">
								<input type="radio" id="pdf" name="docFormat" checked="" value="pdf">
								<label for="pdf" class="ui red label"><i class="file pdf outline icon"></i>PDF</label>
							</div>
						</div>
						<div class="field">
							<div class="ui radio checkbox">
								<input id="word" type="radio" name="docFormat" value="word">
								<label for="word" class="ui blue label"><i class="file word outline icon"></i>Word</label>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="actions">
			<div class="ui black deny button">
				Cancel
			</div>
			<div onclick="document.getElementById('filter').submit();" class="ui positive right labeled icon button">
				Filter & Download
				<i class="checkmark icon"></i>
			</div>
		</div>
	</div>
	{{--END Filter CV--}}
	<br />
	<script>

	</script>
@endsection

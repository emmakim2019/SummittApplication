<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>CV</title>
 <style type="text/css" media="all">
 	/*default version*/
@font-face {
  font-family: 'Questrial';
  src: url('../fonts/Questrial-Regular.ttf'); 
  src: 
    local('Questrial'),
    local('Questrial'),
    url('../fonts/Questrial-Regular.ttf') 
    format('opentype');
}
table { page-break-inside:auto }
tr    { page-break-inside:avoid; page-break-after:auto }
html,body,div,span,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,abbr,address,cite,code,del,dfn,em,img,ins,kbd,q,samp,small,strong,sub,sup,var,b,i,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,figcaption,figure,footer,header,hgroup,menu,nav,section,summary,time,mark,audio,video {
border:0;
font:inherit;
font-size:100%;
margin:0;
padding:0;
vertical-align:baseline;
}

article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section {
display:block;
}

html, body {background: #fff; font-family: 'Questrial', helvetica, arial, sans-serif; font-size: 16px; color: #222;}

.clear {clear: both;}

p {
	font-size: 1em;
	line-height: 1.4em;
	margin-bottom: 20px;
	color: #444;
}

.page-break {
    page-break-after: always;
}

#cv {
    width: 100%;
    background: #fff;
    margin: 30px auto;
    display: flex;
    max-width: 800px;
}

.mainDetails {
	padding: 25px 35px;
	background: #3069AB;
}
.sectionTitle h1::before {
    /* float: left; */
    /* width: 25%; */
    content: "";
    display: block;
    width: 0;
    height: 0;
    border-top: 10px solid white;
    border-bottom: 10px solid transparent;
    border-left: 10px solid #3069AB;
    position: relative;
    top: 22px;
    left: -44px;
}
.sectionTitle hr {
    border-top: 2px solid rgba(0, 0, 0, 0.4);
    margin: 1% 90% 2% 0;
}
#name h1 {
	font-size: 2.5em;
	font-weight: 700;
	font-family: 'Questrial', sans-serif;
	margin-bottom: -6px;
}

#name h2 {
	font-size: 2em;
	margin-left: 2px;
	font-family: 'Questrial', sans-serif;
}

#mainArea {
	padding: 0 40px;
}
#headshot .image {
    width: 130px;
    height: 130px;
    border-radius: 100%;
    margin: 10% auto;
    background-size: cover;
}
#name,
#contactDetails{
	text-align: center;
	margin-bottom: 20px;
	margin-top: 20px;
}
#name h1,
#contactDetails p{
	color: #fff
}
#contactDetails ul {
	list-style-type: none;
	font-size: 0.9em;
	margin-top: 2px;
    display: inline;
    text-align: center;
    justify-content: center;
}
#contactDetails h1,
#contactDetails ul li {
	margin-bottom: 10px;
	color: #fff;
}
div#contactDetails span {
    display: block;
    color: #fff;
    margin-bottom: 10px;
}
.contactTitle h1{
	font-family: 'Questrial', sans-serif;
    font-style: italic;
    font-size: 1.5em;
    color: #fff;
}

#contactDetails ul li a, a[href^=tel] {
	color: #444; 
	text-decoration: none;
	-webkit-transition: all .3s ease-in;
	-moz-transition: all .3s ease-in;
	-o-transition: all .3s ease-in;
	-ms-transition: all .3s ease-in;
	transition: all .3s ease-in;
}

#contactDetails ul li a:hover { 
	color: #505050;
}


section {
	border-top: 1px solid #dedede;
	padding: 0;
}

section:first-child {
	border-top: 0;
}

section:last-child {
	padding: 0;
}


.sectionTitle h1 {
	font-family: 'Questrial', sans-serif;
	font-style: italic;
	font-size: 1.5em;
	color: #505050;
}

.sectionContent h2 {
	font-family: 'Questrial', sans-serif;
	font-size: 1.5em;
	margin-bottom: -2px;
}

.subDetails {
	font-size: 0.8em;
	font-style: italic;
	margin-bottom: 3px;
}

.keySkills {
	list-style-type: none;
	-moz-column-count:3;
	-webkit-column-count:3;
	column-count:3;
	margin-bottom: 20px;
	font-size: 1em;
	color: #444;
}

.keySkills ul li {
	margin-bottom: 3px;
}

@media all and (min-width: 602px) and (max-width: 800px) {
	#headshot {
		display: none;
	}
	
	.keySkills {
	-moz-column-count:2;
	-webkit-column-count:2;
	column-count:2;
	}
}

@media all and (max-width: 601px) {
	#cv {
		width: 95%;
		margin: 10px auto;
		min-width: 280px;
	}
	
	#headshot {
		display: none;
	}
	
	#name, #contactDetails {
		float: none;
		width: 100%;
		text-align: center;
	}
	
	.sectionTitle, .sectionContent {
		float: none;
		width: 100%;
	}
	
	.sectionTitle {
		margin-left: -2px;
		font-size: 1.25em;
	}
	
	.keySkills {
		-moz-column-count:2;
		-webkit-column-count:2;
		column-count:2;
	}
}

@media all and (max-width: 480px) {
	.mainDetails {
		padding: 15px 15px;
	}
	
	section {
		padding: 15px 0 0;
	}
	
	#mainArea {
		padding: 0 25px;
	}

	
	.keySkills {
	-moz-column-count:1;
	-webkit-column-count:1;
	column-count:1;
	}
	
	#name h1 {
		line-height: .8em;
		margin-bottom: 4px;
	}
}
@media print {
table{
	width: 100%;
}	
table, tr, td, th, tbody, thead, tfoot {
    page-break-inside: avoid !important;
}
td section, td div{
    page-break-inside: avoid;
}
}
 </style>
</head>
<body>
  
  <table width="100%" style="width: 100%;background: #fff;margin: 0;" border="0">
      <tr>
        <td class="mainDetails">
        	<table>
        	<tr>
        		<td>
				<div id="headshot" class="quickFade">
				  	<div class="image" style="background-image: url('https://summit.farwell-consultants.com/uploads/{{$details->CandidatePhoto}}');"></div>
				</div>
        		</td>
			</tr>

			<tr>
				<td>
				<div id="name">
					<h1 class="quickFade delayTwo">{{$details->Firstname}} {{$details->Lastname}}</h1>
				</div>
				<div class="clear"></div>
				</td>
			</tr>

			<tr>
				<td style="border-bottom: 1px solid #fff;">
				<div id="contactDetails" class="quickFade delayFour">
					
		            <p>mobile no | {{$cvdets->PhoneNumber}}</p>
		            @if($cvdets->PhoneNumberOther != null)
		            <p>other mobile no | {{$cvdets->PhoneNumberOther}}</p>
		            @endif
		            <p>{{$details->EmailAddress}}</p>
		            @if($cvdets->EmailAddressOther != null)
		            <p>{{$cvdets->EmailAddressOther}}</p>
		            @endif
		            <p>{{$cvdets->Nationality}} | @if($cvdets->Identification != null) {{$cvdets->ID_No}} @else {{$cvdets->Passport_No}} @endif</p>

				</div>
				<div class="clear"></div>
				</td>
			</tr>

			<tr>
				<td style="border-bottom: 1px solid #fff;">
				<div id="contactDetails" class="quickFade delayFour">

		            <p>Driving License | {{$cvdets->DL}} </p>
		            <p>Car Owner | {{$cvdets->CarOwner}} </p>
		            <p>{{$cvdets->PhysicalAddress}} </p>
		            <p>P.O. Box | {{$cvdets->PO_BOX}}</p>
		            <p>D.O.B | {{$cvdets->DOB}} </p>

				</div>
				<div class="clear"></div>
				</td>
			</tr>

			<tr>
				<td style="border-bottom: 1px solid #fff;">
				<div id="contactDetails" class="quickFade delayFour">

					<p class="text-primary"><i class="fa fa-skype"></i></p>
					<p class="text-primary"><b>{{$cvdets->SkypeContact}}</b></p>
					<div class="clear"></div>
					<p class="text-primary"><i class="fa fa-linkedin"></i></p>
					<p class="text-primary"><b>{{$cvdets->LinkedInContact}}</b></p>
				</div>
				</td>
			</tr>

        	<tr>
        		<td style="border-bottom: 1px solid #fff;">
        		@if($lang != null)	
				<div id="contactDetails" class="quickFade delayFour">
					<div class="contactTitle">
						<h1>Languages</h1>
					</div>
					
			  			@if(!empty($lang->Language1))
							<span>{{$lang->Language1}} - {{$lang->Fluency1}}</span>
				  		@endif
					 	@if(!empty($lang->Language2))
							<span>{{$lang->Language2}} - {{$lang->Fluency2}}</span>
				  		@endif
					 	@if(!empty($lang->Language3))
							<span>{{$lang->Language3}} - {{$lang->Fluency3}}</span>
				  		@endif
					 	@if(!empty($lang->Language4))
							<span>{{$lang->Language4}} - {{$lang->Fluency4}}</span>
				  		@endif
						
				</div>
				@endif
        		</td>
        	</tr>

        	<tr>
        		<td>
				<div id="contactDetails" class="quickFade delayFour">
						<div class="contactTitle">
							<h1>Attributes</h1>
						</div>
						
					    	@foreach($attrs as $attr)
					    	@if($attr != null)
								<span>{{$attr}}</span>
							@endif	
							@endforeach	
					</div>
				</td>
        	</tr>

		</table>
        </td>

        <td  id="mainArea">
        	<table style="width: 100%">
        	<tr>
        		<td>
				<section style="border: none;">
					<article>
						<div class="logo">
		                    <img src="https://summit.farwell-consultants.com/images/icons/summit-logo.png" style="width: 20%;float:right">
				  		</div>
					</article>
					<div class="clear"></div>
				</section>
        		</td>
        	</tr>

        	<tr>
        		<td>
				<section>
					<article>
						<div class="sectionTitle">
							<h1>Personal Summary</h1>
							<hr/>
						</div>
						
						<div class="sectionContent">
						<p>{!! $cvdets->PersonalSummary !!}</p>
						</div>
					</article>
					<div class="clear"></div>
				</section>
        		</td>
        	</tr>

        	<tr>
        		<td>
        		@if(count($work) > 0)
				<section>
					<div class="sectionTitle">
						<h1>Work Experience</h1>
							<hr/>
					</div>
					
					<div class="sectionContent">
						@foreach($work as $work)
						<article>
							<h2>{{$work->Title}}</h2>
							<p class="subDetails">Company: {{$work->Company}}</p>
							<p class="subDetails">@php echo date("d-m-Y", strtotime($work->StartDate)); @endphp - @if($work->CurrentDate == 'Yes')  now @else @php echo date("d-m-Y", strtotime($work->EndDate)); @endphp  @endif</p>
							@foreach($workresps as $resp)
								@if($resp->WorkExpID == $work->WorkExpID)
								<p>{!! $resp->Responsibility !!}</p>
								<p>{!! $resp->Responsibility2 !!}</p>
								<p>{!! $resp->Responsibility3 !!}</p>
								<p>{!! $resp->Responsibility4 !!}</p>
								<p>{!! $resp->Responsibility5 !!}</p>
								<p>{!! $resp->Achievement !!}</p>
								<p>{!! $resp->Achievement2 !!}</p>
								<p>{!! $resp->Achievement3 !!}</p>
								<p>{!! $resp->Achievement4 !!}</p>
								<p>{!! $resp->Achievement5 !!}</p>
							    @endif
							@endforeach
						</article>
						@endforeach	
					</div>
					<div class="clear"></div>
				</section>
				@endif
        		</td>
        	</tr>

        	<tr>
        		<td>
        		@if(count($education) > 0)
				<section>
					<div class="sectionTitle">
						<h1>Education</h1>
							<hr/>
					</div>
					
					<div class="sectionContent">
					@foreach($education as $edu)
					@if($edu->FurtherEducation != null)
						<article>
							<h2>{{$edu->FurtherEducation}} {{$edu->Subjects}}</h2>
							<p class="subDetails">{{$edu->Specialization}}</p>
							<p><span>{{$edu->Institution}} |</span> <span>@php echo date("d-m-Y", strtotime($edu->QualStartGradDate)) @endphp -  @php echo date("d-m-Y", strtotime($edu->QualEndGradDate)) @endphp</span></p>
						</article>
					@else
						<article>
							<h2>{{$edu->Institution}}</h2>
							<p><span>@php echo date("d-m-Y", strtotime($edu->QualStartGradDate)) @endphp -  @php echo date("d-m-Y", strtotime($edu->QualEndGradDate)) @endphp</span></p>
						</article>
					@endif	
					@endforeach	
					</div>
					<div class="clear"></div>
				</section>
				@endif	
        		</td>
        	</tr>

        	<tr>
        		<td>
        		@if(count($qualifications) > 0)
				<section>
					<div class="sectionTitle">
						<h1>Professional Qualifications</h1>
							<hr/>
					</div>
					
					<div class="sectionContent">
						@foreach($qualifications as $value => $qual)
						<article>
							<h2>{{$qual->ProfessionalQualifications}}</h2>
							<p class="subDetails">Title: {{$qual->ProfQualTitle}}</p>
							<p><span>@php echo date("d-m-Y", strtotime($qual->StartDate)) @endphp - @php echo date("d-m-Y", strtotime($qual->EndDate)) @endphp</span></p>
						</article>
					    @endforeach	
					</div>
					<div class="clear"></div>
				</section>
				@endif	
        		</td>
        	</tr>

        	<tr>
        		<td>
			    @if(count($qualifications) > 0)
				<section>
					<div class="sectionTitle">
						<h1>Professional Bodies</h1>
							<hr/>
					</div>
					
					<div class="sectionContent">
						@foreach($profbodies as $value => $bodies)

						@foreach($profs as $key => $prof)
						@if($bodies->ProfessionalBody == $profs[$key]->profqualtitleID)
						<article>
							<h2>{{$profs[$key]->profqualtitle}}</h2>
						</article>
						@endif
						@endforeach	
						@endforeach	
					</div>
					<div class="clear"></div>
				</section>
				@endif
        		</td>
        	</tr>

        	<tr>
        		<td>
				<section>
					<div class="sectionTitle">
						<h1>Key Skills</h1>
							<hr/>
					</div>
					@php 
		  		$checks = array(
					array("id" => "Business_Management ", "name" => "Business Management"),
				array("id" => "Computer", "name" => "Computer"),
				array("id" => "Construction", "name" => "Construction"),
				array("id" => "Customer_Service", "name" => "Customer Service"),
				array("id" => "Diplomacy", "name" => "Diplomacy"),
				array("id" => "Effective_Listening", "name" => "Effective Listening"),
				array("id" => "Financial_Management", "name" => "Financial Management"),
				array("id" => "Interpersonal", "name" => "Interpersonal"),
				array("id" => "Multi-tasking", "name" => "Multi-tasking"),
				array("id" => "Negotiating", "name" => "Negotiating"),
				array("id" => "Organisation", "name" => "Organisation"),
				array("id" => "People_Management", "name" => "People Management"),
				array("id" => "Planning", "name" => "Planning"),
				array("id" => "Presentation", "name" => "Presentation"),
				array("id" => "Problem_Solving", "name" => "Problem Solving"),
				array("id" => "Programming", "name" => "Programming"),
				array("id" => "Report_Writing", "name" => "Report Writing"),
				array("id" => "Research", "name" => "Research"),
				array("id" => "Resourcefulness", "name" => "Resourcefulness"),
				array("id" => "Sales_Ability", "name" => "Sales Ability"),
				array("id" => "Technical", "name" => "Technical"),
				array("id" => "Time_Management", "name" => "Time Management"),
				array("id" => "Training", "name" => "Training"),
				array("id" => "Verbal_Communication", "name" => "Verbal Communication"),
				array("id" => "Written_Communication", "name" => "Written Communication"),
				);
		  		@endphp
					<div class="sectionContent">
						<ul class="keySkills">
			  			@foreach($checks as $check)
			  			@if(in_array($check['id'],array_values($skills)))
							<li>{{$check['name']}}</li>
						@endif
						@endforeach	
						</ul>
					</div>
					<div class="clear"></div>
				</section>
        		</td>
        	</tr>

        	<tr>
        		<td>
				<section>
					<div class="sectionTitle">
						<h1>Hard Skills</h1>
							<hr/>
					</div>
					
					<div class="sectionContent">
						<ul class="keySkills">
			  			@foreach($hardskills as $hardskill)
			  			@if(in_array($hardskill->ID,array_values($hskills)))
							<li>{{$hardskill->Name}}</li>
						@endif
						@endforeach	
						</ul>
					</div>
					<div class="clear"></div>
				</section>
        		</td>
        	</tr>

        </table>

        </td>

      </tr>
    </table>

</body>
</html>
@extends('layouts.frontend_base')

@section('content')
	<div id="divImg">
		<img src="{{ asset('static/website/themes/images/fulda2.jpg') }}" alt="" class="img img-responsive">
	</div>

	<!--======= Contact Area =======-->
    <section class="contact">
        <div class="container">
  			<div class="row">
  				<div class="span12">
  					<ul class="breadcrumb">
  						<li><a href="/">Home</a> <span class="divider">/</span></li>
  						<li class="active">Contact</li>
  					</ul>
  					<h3 style="text-align: center;"> Send a message</h3>
  					<hr>
					<div class="row">
						<form class="contact-form">
							<div class="span6">
								<div class="control-group">
									<div class="controls">
										<input type="text" id="name" placeholder="Your Name*" required="">
									</div>
								</div>
								<br>
								<div class="control-group">
									<div class="controls">
										<input type="text" id="mail" placeholder="Email ID*" required="">
									</div>
								</div>
								<br>
								<div class="control-group">
									<div class="controls">
										<input type="text" id="subject" placeholder="Subject*" required="">
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<div class="controls">
										<textarea name="message" placeholder="Your message*" required="" style="min-height: 115px; background-color: none; border: 1px solid black;"></textarea>
									</div>
									<br>
									<div class="contact-btn">
	                                    <button type="submit" class="btn pull-right"><i class="fa fa-rocket"></i>  Send</button>
	                                </div>
								</div>
							</div>
						</form>
					</div>
  				</div>
  			</div>
  		</div>
    </section>
    <!--================Contact Area =================-->
@endsection
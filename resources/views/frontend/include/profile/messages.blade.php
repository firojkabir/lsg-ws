@extends('layouts.frontend_base')

@section('content')
<div id="divImg">
	<img src="{{ asset('static/website/themes/images/fulda2.jpg') }}" alt="" class="img img-responsive">
</div>

<!-- ****** Body part start ****** -->
<div id="mainBody">
	<div class="container">
		<div class="row">

			<!-- ****** Sidebar start ****** -->
			@include('frontend.include.profile.pro_sidebar')
			<!-- ******* Sidebar end ******* -->

			<div class="span9">
				<div class="row content">
					<h3 class=" text-center">Messaging</h3>
					<hr>
					<div class="messaging">
						<div class="inbox_msg">
							<div class="inbox_people">
								<div class="headind_srch">
									<div class="recent_heading">
										<h4>Recent</h4>
									</div>
								</div>
								<div class="inbox_chat">

									@foreach($messages as $msg)

									@php
									$image = "https://ptetutorials.com/images/user-profile.png";

									if($msg->image){
										$image = $msg->path.$msg->image;
									}
									@endphp

									<div class="chat_list" id="{{ $msg->sender }}">
										<div class="chat_people">
											<div class="chat_img"> 
												<img src="{{ $image }}" alt="sunil"> 
											</div>
											<div class="chat_ib">
												<h5>{{ $msg->firstname.' '.$msg->lastname }} <span class="chat_date">{{ date('M d', strtotime($msg->date)) }}</span></h5>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							<div class="mesgs">
								<div class="msg_history">
									
								</div>
								<div class="type_msg">
									<div class="input_msg_write">
										<input type="hidden" name="receiver" value="" id="receiver">
										<input type="text" class="write_msg" placeholder="Type a message" id="details" />
										<button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>    	
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function () {
		$('.chat_list').click(function(e) {
			var id = this.id;
			$('#receiver').val(id);
			retrive(id);
		});

		$('.msg_send_btn').click(function(e) {
			var receiver = $('#receiver').val();
			var details = $('#details').val();
			send_message(receiver, details);
			$('#details').val('');
		});

		function retrive(id){
			$.ajax({
			    type: 'GET',
			    url: '/get_messages/'+id,
			    success: function (data) {
			    	console.log(data);
			    	$('.msg_history').html(data);
			    },
			    error: function() { 
			    	console.log(data);
			    }
			});
		}

		function send_message(receiver, details){
			$.ajax({
			    type: 'POST',
			    data:{receiver:receiver, details:details, "_token": "{{ csrf_token() }}"},
			    url: '/send_message_ajax',
			    success: function (data) {
			    	console.log(data);
			    	retrive(receiver);
			    },
			    error: function() { 
			    	console.log(data);
			    }
			});
		}

	});
</script>

@endsection
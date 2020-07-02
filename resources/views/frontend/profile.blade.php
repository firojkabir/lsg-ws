@extends('layouts.frontend_base')

@section('content')
<div id="divImg">
  <img src="{{ asset('static/website/themes/images/fulda2.jpg') }}" alt="" class="img img-responsive">
</div>
<br>

<section class="htc__product__grid bg__white ptb--50">
    <div class="container">
        <div class="row">
            @include('frontend.include.profile.pro_sidebar')
            
            <div class="profile span9">
                <div class="row content">
                    <div class="page-title">
                        <h2>Profile
                            <a class="btn pull-right" href="/edit_profile">Edit Profile</a>
                        </h2>
                    </div>
                    <hr>
                    <div class="background-white p20 mb10">
                        <h4 class="page-title">Contact Information</h4>
                        <hr class="hr_exception">

                        <form class="contact-form">
                            <div class="span4">
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>Firstname</b></label>
                                        <p style="color: #54C0EB;">
                                            <label>{{ Auth::guard('client')->user()->firstname }}</label>
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>E-mail</b></label>
                                        <p style="color: #54C0EB;">
                                            <label>{{ Auth::guard('client')->user()->email }}</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="span5">
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>Lastname</b></label>
                                        <p style="color: #54C0EB;">
                                            <label>{{ Auth::guard('client')->user()->lastname }}</label>
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>Phone</b></label>
                                        <p style="color: #54C0EB;">
                                            <label>{{ Auth::guard('client')->user()->phone }}</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="hr_exception">
                            <h4 class="page-title">Address</h4></h4>
                            <hr class="hr_exception">

                            <div class="span4">
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>Street</b></label>
                                        <p style="color: #FD8469;">
                                            <label>{{ Auth::guard('client')->user()->street }}</label>
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>City</b></label>
                                        <p style="color: #FD8469;">
                                            <label>{{ Auth::guard('client')->user()->city }}</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="span5">
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>ZIP</b></label>
                                        <p style="color: #FD8469;">
                                            <label>{{ Auth::guard('client')->user()->zip }}</label>
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>Country</b></label>
                                        <p style="color: #FD8469;">
                                            <label>{{ Auth::guard('client')->user()->country }}</label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection
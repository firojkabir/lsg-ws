@extends('layouts.frontend_base')

@section('content')
	<div id="divImg">
		<img src="{{ asset('static/website/themes/images/fulda2.jpg') }}" alt="" class="img img-responsive">
	</div>
    <br>
    
    <form action="/edit_profile" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="edit_profile htc__product__grid bg__white ptb--50">
            <div class="container">
                <div class="row">
                    <div class="photo span3" style="margin-top: 40px;">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="user-photo">
                                    <div class="row">
                                        <div class="col-smx-2 imgUp">
                                            <div class="imagePreview"></div>
                                            <label class="btn">
                                            Upload Photo<input type="file" class="file" value="Upload Photo" style="width: 100%: 0px;overflow: hidden;" name="image" id="image">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="widget">
                                    @include('frontend.include.profile.pro_sidebar')
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="span9">
                        <div class="content">
                            <div class="page-title">
                                <h2>Edit Profile</h2>
                            </div>
                            <hr>
                            <div class="background-white p20 mb10">
                                <h4 class="page-title">Contact Information</h4>
                                <hr class="hr_exception">
                                <div class="row">
                                    <div class="form-group span4">
                                        <label><b>Firstname <span style="color: red;">*</span></b></label>
                                        <input type="text"  class="form-control" value="{{ $result->firstname }}" name="firstname" required>
                                    </div>
                                    <div class="form-group span4">
                                        <label><b>Lastname <span style="color: red;">*</span></b></label>
                                        <input type="text"  class="form-control" value="{{ $result->lastname }}" name="lastname" required>
                                    </div>
                                    <div class="form-group span4">
                                        <label><b>Phone <span style="color: red;">*</span></b></label>
                                        <input type="text"  class="form-control" value="{{ $result->phone }}" name="phone" required>
                                    </div>
                                </div>
                            </div>
                            <div class="background-white p20 mb10">
                                <hr class="hr_exception">
                                <h4 class="page-title">Address</h4>
                                <hr class="hr_exception">
                                <div class="row">
                                    <div class="form-group span4">
                                        <label><b>Street <span style="color: red;">*</span></b></label>
                                        <input type="text"  class="form-control" value="{{ $result->street }}" name="street" required>
                                    </div>
                                    <div class="form-group span4">
                                        <label><b>City <span style="color: red;">*</span></b></label>
                                        <input type="text"  class="form-control" value="{{ $result->city }}" name="city" required>
                                    </div>
                                    <div class="form-group span4">
                                        <label><b>ZIP <span style="color: red;">*</span></b></label>
                                        <input type="text"  class="form-control" value="{{ $result->zip }}" name="zip" required>
                                    </div>
                                    <div class="form-group span4">
                                        <label><b>Country <span style="color: red;">*</span></b></label>
                                        <input type="text"  class="form-control" value="{{ $result->country }}" name="country" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success pull-right">Update Info</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

@endsection
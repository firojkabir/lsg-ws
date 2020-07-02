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

                <div class="span9">
                    <div class="row content">
                        <div class="page-title">
                            <h3>Change password</h3>
                        </div>
                        <hr>
                        <form class="change_password_form">
                            <div class="span5">
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>Email<span style="color: red;">*</span></b></label>
                                        <input type="email" class="form-control" value="" name="email" required>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>Current password<span style="color: red;">*</span></b></label>
                                        <input type="password" class="form-control" value="" name="password" required>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="span4">
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>New password<span style="color: red;">*</span></b></label>
                                        <input type="password" class="form-control" value="" name="n_password" required> 
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="controls">
                                        <label><b>Confirm password<span style="color: red;">*</span></b></label>
                                        <input type="password" class="form-control" value="" name="c_password" required> 
                                    </div>
                                </div>
                                <br>
                            </div>
                            <button class="btn btn-md pull-right" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
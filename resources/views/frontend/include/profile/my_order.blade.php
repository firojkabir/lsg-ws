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
                    <div class="content">
                        <div class="page-title">
                            <h3>My Orders</h3>
                        </div>
                        <hr>
                        <div class="table-content table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="si">SI No</th>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Total Amount</th>
                                        <th class="product-quantity">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($results as $result)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $result->product }}</td>
                                        <td>{{ $result->total }}</td>
                                        <td>{{ date('M d, Y', strtotime($result->created_at)) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection
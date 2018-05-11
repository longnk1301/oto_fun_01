@extends('layouts.index')

@section('content')
<div class="container post clearfix">
    <div class="row clearfix search-box">
        <div class="search-box-wrapper">
        	<form action="{{ route('client.search') }}" method="get" accept-charset="utf-8">
        		<div class="row">
        			<div class="col-md-12">
        				<h1>{!! trans('index.used_car_for_sale') !!}</h1>
        			</div>
        		</div>
        		<div class="row">
        			<div class="col-md-8">
        				<div class="suggest">
        					<input type="text" class="form-control" placeholder="{!! trans('index.search_by') !!}" name="keyword">
        				</div>
        			</div>
        			<div class="col-md-4">
        				<div>
        					<button type="submit">{!! trans('index.go') !!}</button>
        				</div>
        			</div>
        		</div>
        		{{-- <div class="search-list">
        			<div>
        				<i class="fa fa-car" aria-hidden="true"></i>
        				<span>
        					<strong>Find a Car by:</strong>
        					<div class="">
        						<span>
        							<a href="#">Make</a>
        						</span>
        						<span>
        							<a href="#">Type</a>
        						</span>
        						<span>
        							<a href="#">Year</a>
        						</span>
        						<span>
        							<a href="#">Price</a>
        						</span>
        					</div>
        				</span>
        			</div>
        			<div class="item-list">
        				<div class="">
        					<div class="clearfix">
        						<div class="search-list-tab">
        							<ul>
        								<li>
        									<a href="#">Aura</a>
        								</li>
        								<li>
        									<a href="#">Aura</a>
        								</li>
        								<li>
        									<a href="#">Aura</a>
        								</li>
        								<li>
        									<a href="#">Aura</a>
        								</li>
        							</ul>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="item-list-2">
        				<div class="">
        					<div class="clearfix">
        						<div class="search-list-tab">
        							<ul>
        								<li>
        									<a href="#">Truck</a>
        								</li>
        								<li>
        									<a href="#">Van</a>
        								</li>
        								<li>
        									<a href="#">Wagon</a>
        								</li>
        								<li>
        									<a href="#">SUV</a>
        								</li>
        							</ul>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="item-list-3">
        				<div class="">
        					<div class="clearfix">
        						<div class="search-list-tab">
        							<ul>
        								<li>
        									<a href="#">2018</a>
        								</li>
        								<li>
        									<a href="#">2017</a>
        								</li>
        								<li>
        									<a href="#">2016</a>
        								</li>
        								<li>
        									<a href="#">2015</a>
        								</li>
        							</ul>
        						</div>
        					</div>
        				</div>
        			</div>
        			<div class="item-list-4">
        				<div class="">
        					<div class="clearfix">
        						<div class="search-list-tab">
        							<ul>
        								<li>
        									<a href="#">Below $15000</a>
        								</li>
        								<li>
        									<a href="#">$15000 - $17000</a>
        								</li>
        								<li>
        									<a href="#">$17000 - $20000</a>
        								</li>
        								<li>
        									<a href="#">Above $20000</a>
        								</li>
        							</ul>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div> --}}
        	</form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('scripts')
	<script src="{{ mix('js/dashboard.js') }}"></script>
@endsection

@section('content')

	<!-- PAGE TITLE -->
	<page-title :title="'Dashboard'"></page-title>

	{{-- SUBSCRIBE LINK --}}
	@include('components.subscribe-link')

	<div class="row gutters-sm">
		<div class="col-12 col-md-6 col-xl-4 mb-3">
			<div class="bg-white shadow-md text-dark p-5 rounded text-center">
				<h3 class="fs--20 mt-2">This Month</h3>
				<p class="display-5">£86.33</p>
			</div>
		</div>
		<div class="col-12 col-md-6 col-xl-4 mb-3">
			<div class="bg-white shadow-md text-dark p-5 rounded text-center">	
				<h3 class="fs--20 mt-2">Next Month</h3>
				<p class="display-5">£55.24</p>
			</div>
		</div>
		<div class="col-12 col-md-6 col-xl-4 mb-3">
			<div class="bg-white shadow-md text-dark p-5 rounded text-center">	
				<h3 class="fs--20 mt-2">This Year</h3>
				<p class="display-5">£55.24</p>
			</div>
		</div>
	</div>

	{{-- PORTFOLIO --}}
	<b-row class="mb-3">
		<b-col>
			<portfolio></portfolio>
		</b-col>
	</b-row>

	{{-- PLAN ADVERT --}}
	<b-row class="mb-3">
		<b-col>
			<div class="card b-0 shadow-md shadow-lg-hover h-100">

				<div class="card-body font-weight-light mt--60">

					<div class="d-table">
						<div class="d-table-cell align-bottom">

							<p class="lead">
								Upgrade to a paid plan
							</p>
							
							<div class="d-flex mb-3">
								<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
									<i class="fas fa-check"></i>
								</div>
								<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
									Add up to 100 portfolio items
								</p>
							</div>
							<div class="d-flex mb-3">
								<div class="badge badge-success badge-soft badge-ico-sm rounded-circle float-start">
									<i class="fas fa-check"></i>
								</div>
								<p class="text-dark font-weight-light mb-0 pl--12 pr--12">
									View shared portfolios
								</p>
							</div>
							
						</div>
					</div>

				</div>

				<div class="card-footer bg-transparent b-0">
					<hr class="border-secondary opacity-2">

					<span class="float-end fs--14 text-gray-500 p-2">
						only £1/month!
					</span>

					<a href="#" class="btn btn-sm btn-success">
						Join now
					</a>
				</div>

			</div>
		</b-col>
	</b-row>

	{{-- <div class="row mb-3">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<new-position></new-position>
				</div>
			</div>
		</div>
	</div> --}}


	<!-- BIG TABLE -->
	{{-- <section class="rounded mb-3 border">

		<!-- header -->
		<div class="clearfix fs--18 pt-2 pb-3 mb-3 border-bottom">

			<a href="#" class="btn btn-sm btn-light rounded-circle chartjs-save float-end m-0 js-chartjsified"
				title="Add Position" aria-label="Add Position">
				<i class="fas fa-plus m-0"></i>
			</a>

			Your Portfolio
			<small class="fs--11 text-muted d-block mt-1">MONTHLY REVENUE FOR 2020</small>

		</div>
		<!-- /header -->

		<div class="row gutters-sm">
			<div class="col-12 mb-5">
				<div class="position-relative">					
					<table class="table table-bordered table-active">
						<thead>
							<tr>
								<th>Ticker</th>
								<th>Name</th>
								<th>Dividend</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>RDSA.L</td>
								<td>Royal Dutch Shell</td>
								<td>£0.96</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</section> --}}


	<!-- WIDGETS -->
	<div class="row gutters-sm">
		
		{{-- FEATURES --}}
		<div class="col-12 col-md-6 col-xl-6 mb-3">
			<div class="portlet">
				<div class="portlet-header">
					<span class="d-block text-muted text-truncate font-weight-medium">
						Features
					</span>
				</div>
				<div class="portlet-body max-h-500 tab-content">
					<div class="max-h-500 scrollable-vertical scrollable-styled-dark align-self-baseline h-100 max-h-500 w-100">
						<task-item border="danger" :task="'Add Position to Portfolio'"></task-item>
						<task-item border="danger" :task="'Update Position price and quantity'"></task-item>
						<task-item border="warning" :task="'Open Profiles; allow users to &quot;share&quot; their profiles. Show a list of Open Profiles for users to view.'"></task-item>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

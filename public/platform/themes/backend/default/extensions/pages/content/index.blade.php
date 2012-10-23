@layout('templates.default')

<!-- Page Title -->
@section('title')
	pages - Pages
@endsection

<!-- Queue Styles -->
{{ Theme::queue_asset('table', 'css/table.css', 'style') }}

<!-- Styles -->
@section ('styles')
@endsection

<!-- Queue Scripts -->
{{ Theme::queue_asset('table', 'js/vendor/platform/table.js', 'jquery') }}
{{ Theme::queue_asset('pages', 'pages::js/table-content.js', 'jquery') }}

<!-- Scripts -->
@section('scripts')
@endsection

<!-- Page Content -->
@section('content')
<section id="pages-content">

	<!-- Tertiary Navigation & Actions -->
	<header class="navbar">
		<div class="navbar-inner">
			<div class="container">

			<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			<a class="btn btn-navbar" data-toggle="collapse" data-target="#tertiary-navigation">
				<span class="icon-reorder"></span>
			</a>

			<a class="brand" href="#">Content Management</a>

			<!-- Everything you want hidden at 940px or less, place within here -->
			<div id="tertiary-navigation" class="nav-collapse">
				@widget('platform.menus::menus.nav', 2, 1, 'nav nav-pills', ADMIN)
			</div>

			</div>
		</div>
	</header>

	<hr>

	<div class="quaternary page">

		<div id="table">
			<div class="actions clearfix">
				<div id="table-filters" class="form-inline pull-left"></div>
				<div class="processing pull-left"></div>
				<div class="pull-right">
					<a class="btn btn-large btn-primary" href="{{ URL::to_secure(ADMIN.'/pages/content/create') }}">{{ Lang::line('button.create') }}</a>
				</div>
			</div>

			<div class="tabbable tabs-right">
				<ul id="table-pagination" class="nav nav-tabs"></ul>
				<div class="tab-content">
					<table id="users-table" class="table table-bordered table-striped">
						<thead>
							<tr>
								@foreach ($columns as $key => $col)
								<th data-table-key="{{ $key }}">{{ $col }}</th>
								@endforeach
								<th></th>
							</tr>
						<thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

</section>
@endsection
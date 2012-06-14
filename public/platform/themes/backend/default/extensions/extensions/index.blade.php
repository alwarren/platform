@layout('templates.template')

@section('title')
	{{ Lang::line('extensions::extensions.title') }}
@endsection

@section('links')
	{{ Theme::asset('css/table.css') }}
@endsection

@section('body_scripts')
	{{ Theme::asset('extensions::js/extensions.js') }}
@endsection

@section('content')
	<section id="extensions" class="row-fluid">
		<h1>{{ Lang::line('extensions::extensions.title') }}</h1>

		<h2>Uninstalled Extensions</h2>
		<div class="row-fluid">
			<table id="uninstalled-extension-table" class="table table-bordered">
				<thead>
					<tr>
						<th>{{ Lang::line('extensions::extensions.name') }}</th>
						<th>{{ Lang::line('extensions::extensions.slug') }}</th>
						<th>{{ Lang::line('extensions::extensions.author') }}</th>
						<th>{{ Lang::line('extensions::extensions.description') }}</th>
						<th>{{ Lang::line('extensions::extensions.version') }}</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@forelse ($uninstalled as $extension)
						<tr>
							<td>
								{{ array_get($extension, 'info.name') }}
							</td>
							<td>
								{{ array_get($extension, 'info.slug') }}
							</td>
							<td>
								{{ array_get($extension, 'info.author') }}
							</td>
							<td>
								{{ array_get($extension, 'info.description') }}
							</td>
							<td>
								{{ array_get($extension, 'info.version') }}
							</td>
							<td>
								<a href="{{ url(ADMIN.'/extensions/install/'.array_get($extension, 'info.slug')) }}" onclick="return confirm('Are you sure you want to install the \'{{ e(array_get($extension, 'info.name')) }}\' extension?');">install</a>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="6">
								Good news! All extensions have been installed!
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>

		<h2>Installed Extensions</h2>
		<div id="table-actions">
			<div class="row-fluid">
				<div id="table-filters" class="span8"></div>
				<div id="actions" class="span4">
				</div>
			</div>
			<div class="row-fluid">
				<div id="table-filters-applied" class="span12"></div>
			</div>
		</div>

		<div id="table-wrapper">
			<div class="row-fluid">
				<table id="installed-extension-table" class="table table-bordered">
					<thead>
						<tr>
							@foreach ($columns as $key => $col)
								<th data-table-key="{{ $key }}">{{ $col }}</th>
							@endforeach
							<th></th>
						</tr>
					<thead>
					<tbody>
						@include('extensions::partials.table_extensions')
					</tbody>
				</table>
				<div class="tabs-right">
					<ul id="table-pagination" class="nav nav-tabs"></ul>
				</div>
			</div>
		</div>

	</section>
@endsection

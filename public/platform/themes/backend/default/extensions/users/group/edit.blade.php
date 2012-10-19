@layout('templates.default')

<!-- Page Title -->
@section('title')
	{{ Lang::line('users::general.groups.update.title') }}
@endsection

<!-- Queue Styles | e.g Theme::queue_asset('name', 'path_to_css', 'dependency')-->

<!-- Styles -->
@section ('styles')
@endsection

<!-- Queue Scripts -->
{{ Theme::queue_asset('bootstrap-tab','js/bootstrap/tab.js', 'jquery') }}

<!-- Scripts -->
@section('scripts')
@endsection

<!-- Page Content -->
@section('content')
	<section id="groups-edit">

		<header class="clearfix">
			<div class="pull-left">
				<h1>{{ Lang::line('users::general.groups.update.title') }}</h1>
				<p>{{ Lang::line('users::general.groups.update.description') }}</p>
			</div>
			<nav class="tertiary-navigation pull-right visible-desktop">
				@widget('platform.menus::menus.nav', 2, 1, 'nav nav-pills', ADMIN)
			</nav>
		</header>

		<hr>

		<div class="quaternary-navigation">
		    <nav class="tabbable visable-desktop">
		    	<ul class="nav nav-tabs">
					<li class="active"><a href="#general" data-toggle="tab">{{ Lang::line('users::general.tabs.general') }}</a></li>
					<li><a href="#permissions" data-toggle="tab">{{ Lang::line('users::general.tabs.permissions') }}</a></li>
			</ul>
		    </nav>
		    <div class="tab-content">
		        <div class="tab-pane active" id="general">
			    	@widget('platform.users::admin.group.form.edit', $id)
			    </div>
			    <div class="tab-pane" id="permissions">
			    	@widget('platform.users::admin.group.form.permissions', $id)
			    </div>
		    </div>
		</div>

	</section>
@endsection
